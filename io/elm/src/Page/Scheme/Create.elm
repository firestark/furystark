module Page.Scheme.Create exposing (Model, Msg, init, toSession, toTheme, update, view)

import Element exposing (Element, column, width, fill, height, maximum, centerX, centerY, row, paddingXY, paddingEach, text, px, alignRight, spacing)
import Element.Background as Background
import Element.Events exposing (onClick)
import Element.Font as Font
import Exercise exposing (Exercise)
import Html exposing (Html)
import Html.Attributes
import Material.Icons
import Material.List
import Material.Textfield
import Material.TopAppBar
import Material.UpArrow as UpArrow
import Page
import Page.Scheme.Exercise.Add as Exercise
import Route
import Session exposing (Session)
import Theme exposing (Theme)


type Page
    = SchemeDetails
    | AddExercise

type alias Model =
    { theme : Theme
    , session : Session
    , schemeName : String
    , schemeNameError : Maybe String
    , exercises : List (Int, Exercise)
    , page : Page
    , exercise : Exercise.Model
    }

init : Session -> Theme -> ( Model, Cmd Msg )
init session theme =
    ( { theme = theme
      , session = session
      , schemeName = ""
      , schemeNameError = Nothing
      , exercises = []
      , page = SchemeDetails
      , exercise = Exercise.init theme
      }
    , Cmd.none
    )

type Msg
    = NameEntered String
    | PageSwitched Page
    | GotAddExerciseMsg Exercise.Msg
    | ExerciseRemoved Int
    | SaveButtonPressed

update : Msg -> Model -> ( Model, Cmd Msg )
update msg model =
    case msg of
        NameEntered input ->
            if String.isEmpty input then
                ( { model | schemeName = input, schemeNameError = Just "Scheme name field is required." }, Cmd.none )
            else
                ( { model | schemeName = input, schemeNameError = Nothing }, Cmd.none )
        PageSwitched page ->
            ( { model | page = page }, Cmd.none )
        GotAddExerciseMsg subMsg ->
            let newModel = { model | exercise = Exercise.update subMsg model.exercise }
            in case subMsg of
                Exercise.UpArrowPressed ->
                    update (PageSwitched SchemeDetails) newModel
                
                Exercise.CheckPressed ->
                    case newModel.exercise.exercise of
                        Nothing -> (newModel, Cmd.none)
                        Just exercise -> 
                            update (PageSwitched SchemeDetails) 
                            { newModel | exercises = List.append newModel.exercises [ (getNewId newModel.exercises, exercise) ] }
                _ ->
                    (newModel, Cmd.none)

        ExerciseRemoved id ->
            let
                exercises = List.filter (not << isId id) model.exercises
            in
            
            ( { model | exercises = exercises }, Cmd.none )

        SaveButtonPressed ->
            if String.isEmpty model.schemeName then
                ( { model | schemeNameError = Just "Scheme name field is required." }, Cmd.none )
            else
                ( model, Cmd.none )

------------------------------------------------------------------------------------
-- Utility
------------------------------------------------------------------------------------

toSession : Model -> Session
toSession model =
    model.session

toTheme : Model -> Theme
toTheme model =
    model.theme

getNewId : List (Int, Exercise) -> Int
getNewId exerciseList =
    let exercise = List.head <| List.reverse exerciseList
    in case exercise of
        Nothing -> 1
        Just (id, _) -> id + 1

isId : Int -> (Int, Exercise) -> Bool
isId id (exerciseId, _) =
    id == exerciseId


------------------------------------------------------------------------------------
-- Main pages
------------------------------------------------------------------------------------

view : Model -> { title : String, content : Html Msg }
view model =
    { title = "Schemes"
    , content = body model
    }

body : Model -> Html Msg
body model =
    case model.page of
        SchemeDetails -> schemeDetailsBody model
        AddExercise -> Html.map GotAddExerciseMsg <| Exercise.view model.exercise


schemeDetailsBody : Model -> Html Msg
schemeDetailsBody model =
    Page.wrapper model.theme.background
    <|
        column
            [ width fill
            , height fill
            ]
            [ topAppBar
                model
            , column
                [ width <| maximum 1200 fill
                , height fill
                , Element.paddingEach
                    { top = 0
                    , right = 16
                    , bottom = 72
                    , left = 16
                    }
                , centerX
                ]
                [ contents model
                ]
            ]

contents : Model -> Element Msg
contents model =
    if List.isEmpty model.exercises then
        Element.paragraph 
            [ Font.size 16
            , Font.color <| Theme.highlight model.theme.kind 0.5
            , centerX
            , centerY
            ]
            [ Element.text "Add scheme exercises by pressing the + button on the top right."
            ]

        
    else
        list model.theme (List.map toItem model.exercises)

------------------------------------------------------------------------------------
-- Top app bar
------------------------------------------------------------------------------------

topAppBar : Model -> Element Msg
topAppBar model =
    column 
    [ width fill 
    , Element.htmlAttribute <|
        Html.Attributes.style "z-index" "100"
    , Material.TopAppBar.elevation
    ] 
    [ row
        [ width fill
        , height (px 64)
        , paddingXY 16 12
        , Background.color model.theme.primary
        , Font.color model.theme.onPrimary
        ]
        [ UpArrow.view (UpArrow.Route Route.Schemes)
        , Material.TopAppBar.title "Add scheme"
        , row 
            [ spacing 24
            , alignRight
            ] 
            [ addIcon
            , checkIcon
            ]
        ]
    , row
        [ width fill
        , height (px (64 + 16))
        , paddingXY 16 12
        , Background.color model.theme.primary
        , Font.color model.theme.onPrimary
        ]
        [ schemeNameField model
        ]
    ]

schemeNameField : Model -> Element Msg
schemeNameField model =
    Material.Textfield.transparent model.theme
        { value = model.schemeName
        , label = "Scheme name*"
        , error = model.schemeNameError
        , onInput = NameEntered
        }
    
addIcon : Element Msg
addIcon =
    Material.TopAppBar.iconButton
        [ onClick <| PageSwitched AddExercise ]
        Material.Icons.add_circle

checkIcon : Element Msg
checkIcon =
    Material.TopAppBar.iconButton 
        [ onClick SaveButtonPressed ] 
        Material.Icons.check

------------------------------------------------------------------------------------
-- List
------------------------------------------------------------------------------------

type alias Item =
    { id : Int
    , first : String
    , url : Maybe String
    }


toItem : (Int, Exercise) -> Item
toItem (id, { name, sets, reps }) =
    { id = id
    , first = name ++ " (" ++ String.fromInt sets ++ "x" ++ String.fromInt reps ++ ")"
    , url = Nothing
    }

list : Theme -> List Item -> Element Msg
list theme items =
    column 
        [ width fill
        , Font.color theme.onBackground
        , paddingXY 0 8
        ]
        <| List.map (singleElement theme) items

singleElement : Theme -> Item -> Element Msg
singleElement theme item =
    Material.List.singleElement
        []
        [ Material.List.text theme item.first
        , Material.List.icon theme [ onClick <| ExerciseRemoved item.id ] Material.Icons.delete
        ]