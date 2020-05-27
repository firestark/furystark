module Page.Scheme.Exercise.Add exposing (Model, Msg(..), init, isValid, update, view)

import Element exposing (Element, centerX, column, fill, height, maximum, paddingEach, scrollbarY, width)
import Element.Events exposing (onClick)
import Exercise exposing (Exercise)
import Html exposing (Html)
import Material.Icons as Icon
import Material.Textfield as Textfield
import Material.TopAppBar as TopAppBar
import Material.UpArrow as UpArrow
import Page
import Theme exposing (Theme)

type alias Model =
    { theme : Theme
    , name : String
    , nameError : Maybe String
    , sets : Maybe Int
    , setsError : Maybe String
    , reps : Maybe Int
    , repsError : Maybe String
    , exercise : Maybe Exercise
    }

type Msg
    = NameEntered String
    | SetsEntered String
    | RepsEntered String
    | UpArrowPressed
    | CheckPressed

init : Theme -> Model
init theme =
    { theme = theme
    , name = ""
    , nameError = Nothing
    , sets = Nothing
    , setsError = Nothing
    , reps = Nothing
    , repsError = Nothing
    , exercise = Nothing
    }

update : Msg -> Model -> Model
update msg model =
    case msg of
        NameEntered input -> 
            if String.isEmpty input then
                { model | name = input, nameError = Just "Exercise name field is required." }
            else
                { model | name = input, nameError = Nothing }
        
        SetsEntered input ->
            if String.isEmpty input then
                { model | sets = Nothing, setsError = Just "Sets field is required." }
            else

            let val = String.toInt input
            in case val of
                Nothing -> { model | setsError = Just "Value must be a number." }
                Just int -> { model | sets = Just int, setsError = Nothing }
        
        RepsEntered input ->
            if String.isEmpty input then
                { model | reps = Nothing, repsError = Just "Reps field is required." }
            else

            let val = String.toInt input
            in case val of
                Nothing -> { model | repsError = Just "Value must be a number." }
                Just int -> { model | reps = Just int, repsError = Nothing }

        UpArrowPressed -> { model | name = "", sets = Nothing, reps = Nothing }
        
        CheckPressed ->
            let 
                nameErrorsModel = nameErrors model
                setsErrorsModel = setsErrors nameErrorsModel
                repsErrorsModel = repsErrors setsErrorsModel
            in
                if isValid repsErrorsModel then
                    { model | exercise = createExercise repsErrorsModel, name = "", sets = Nothing, reps = Nothing }
                else
                    repsErrorsModel

createExercise : Model -> Maybe Exercise
createExercise { name, sets, reps } =
    case ( name, sets, reps ) of
       ( exerciseName, Just setInt, Just repInt ) -> Just <| Exercise exerciseName setInt repInt
       ( _, _, _ ) -> Nothing

------------------------------------------------------------------------------------
-- Validation
------------------------------------------------------------------------------------

isValid : Model -> Bool
isValid { nameError, setsError, repsError } =
    case (nameError, setsError, repsError) of
        (Nothing, Nothing, Nothing) -> True
        (_, _, _) -> False

nameErrors : Model -> Model
nameErrors model =
    if String.isEmpty model.name then
        { model | nameError = Just "Exercise name field is required." }
    else
        model

setsErrors : Model -> Model
setsErrors model =
    case model.sets of
        Nothing -> { model | setsError = Just "Sets field is required." }
        Just _ -> model

repsErrors : Model -> Model
repsErrors model =
    case model.reps of
        Nothing -> { model | repsError = Just "Reps field is required." }
        Just _ -> model

view : Model -> Html Msg
view model =
    Page.wrapper model.theme.background
    <|
        column
            [ width fill
            , height fill
            ]
            [ topAppBar model.theme "Add exercise"
            , column
                [ width <| maximum 1200 fill
                , height fill
                , centerX
                , scrollbarY
                , paddingEach
                    { top = 16
                    , right = 16
                    , bottom = 72
                    , left = 16
                    }
                , Element.spacingXY 0 24
                ]
                [ Textfield.regular model.theme 
                    { value = model.name
                    , label = "Exercise name*"
                    , error = model.nameError
                    , onInput = NameEntered
                    }
                , Textfield.regular model.theme 
                    { value = value model.sets
                    , label = "Sets*"
                    , error = model.setsError
                    , onInput = SetsEntered
                    }
                , Textfield.regular model.theme 
                    { value = value model.reps
                    , label = "Reps*"
                    , error = model.repsError
                    , onInput = RepsEntered
                    }                
                ]
            ]

value : Maybe Int -> String
value input =
    case input of
        Nothing -> ""
        Just int -> String.fromInt int

topAppBar : Theme -> String -> Element Msg
topAppBar theme title =
    TopAppBar.row theme
        [ UpArrow.view (UpArrow.Action UpArrowPressed)
        , TopAppBar.title title
        , TopAppBar.iconButton 
            [ onClick CheckPressed 
            ] 
            Icon.check
        ]