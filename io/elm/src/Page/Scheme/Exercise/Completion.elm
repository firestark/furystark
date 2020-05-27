module Page.Scheme.Exercise.Completion exposing (Model, Msg(..), init, view, update)

import Array exposing (Array)
import Element exposing (Element, alignBottom, centerX, centerY, column, fill, height, maximum, paddingXY, px, row, width)
import Element.Background as Background
import Element.Border as Border
import Element.Font as Font
import Element.Input as Input
import Exercise exposing (Exercise)
import Html exposing (Html)
import Html.Attributes
import Material.Button as Button
import Material.TopAppBar as TopAppBar
import Material.UpArrow as UpArrow
import Page
import Theme exposing (Theme)

type Msg
    = UpArrowPressed
    | ResultEntered String
    | NextPressed
    | PreviousPressed
    | FinishPressed

update : Msg -> Model -> Model
update msg model =
    case msg of
        ResultEntered input ->
            let number = String.toInt input
            in case number of
                Nothing -> model
                Just int ->
                    { model | values = Array.set (model.set - 1) int model.values }

        UpArrowPressed ->
            model

        NextPressed ->
            { model | set = model.set + 1 }

        PreviousPressed ->
            { model | set = model.set - 1 }

        FinishPressed ->
            model

type alias Model =
    { theme : Theme
    , exercise : Exercise
    , set : Int
    , values : Array Int
    }

init : Theme -> Exercise -> List Int -> Model
init theme exercise values =
    { theme = theme
    , exercise = exercise
    , set = 1
    , values = Array.fromList values
    }

view : Model -> Html Msg
view model = 
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
                    , bottom = 16
                    , left = 16
                    }
                , centerX
                ]
                [ numberInput model.theme (String.fromInt <| Maybe.withDefault 0 (Array.get (model.set - 1) model.values))
                , buttons model
                ]
            ]

numberInput : Theme -> String -> Element Msg
numberInput theme value =
    Element.el 
        [ width (px 350)
        , height (px 350)
        , Border.rounded 350 
        , Border.color <| theme.secondary
        , Border.width 12
        , Font.size 90
        , Font.center
        , Font.color <| Theme.highlight theme.kind 0.72
        , centerY
        , centerX
        ]
    
    <|

    Input.text 
        [ Background.color <| Element.rgba255 0 0 0 0
        , Border.width 0 
        , Border.color <| Element.rgba255 0 0 0 0
        , Font.size 90
        , Font.center
        , Font.color <| Theme.highlight theme.kind 0.72
        , centerY
        , centerX
        , Element.htmlAttribute <| 
            Html.Attributes.style "text-align" "center"
        , Element.focused 
            [ Border.shadow
                { offset = ( 0, 0 )
                , size = 0
                , blur = 0
                , color = Element.rgba255 0 0 0 0
                }
            ]
        ]
        { onChange = ResultEntered
        , text = value
        , placeholder = Nothing
        , label  = Input.labelHidden "Result"
        }

isValid : Array Int -> Int -> Bool
isValid values set =
    let maybeInt = Array.get set values
    in case maybeInt of
        Nothing -> False
        Just int ->
            case int of
                0 -> False
                _ -> True

buttons : Model -> Element Msg
buttons model =
    if model.set == model.exercise.sets then
        row 
            [ alignBottom
            , width fill
            ] 
            [ previousButton model
            , finishButton model
            ]
    else if model.set > 1 then
        row 
            [ alignBottom
            , width fill
            ] 
            [ previousButton model
            , nextButton model
            ]
    else
        row 
            [ alignBottom
            , width fill
            ] 
            [ nextButton model
            ]
        
nextButton : Model -> Element Msg
nextButton model =
    if not (isValid model.values (model.set - 1)) then
        Button.disabled 
            model.theme 
            [ Element.alignRight ]
            "NEXT"
    else
        Button.raised 
            model.theme 
            [ Element.alignRight ]
            "NEXT"
            (Just NextPressed)

previousButton : Model -> Element Msg
previousButton model =
    Button.text 
        model.theme 
        [ Element.alignLeft ]
        "PREVIOUS"
        (Just PreviousPressed)

finishButton : Model -> Element Msg
finishButton model =
    if not (isValid model.values (model.set - 1)) then
        Button.disabled 
            model.theme 
            [ Element.alignRight ]
            "FINISH"
    else
        Button.raised 
            model.theme 
            [ Element.alignRight ]
            "FINISH"
            (Just FinishPressed)


------------------------------------------------------------------------------------
-- Top app bar
------------------------------------------------------------------------------------

topAppBar : Model -> Element Msg
topAppBar model =
    column 
    [ width fill 
    , TopAppBar.elevation
    ] 
    [ row
        [ width fill
        , height (px 64)
        , paddingXY 16 12
        , Background.color model.theme.primary
        , Font.color model.theme.onPrimary
        ]
        [ UpArrow.view (UpArrow.Action UpArrowPressed)
        , TopAppBar.title model.exercise.name
        ]
    , row
        [ width fill
        , height (px 64)
        , paddingXY 16 12
        , Background.color model.theme.primary
        , Font.color model.theme.onPrimary
        ]
        [ Element.el 
            [ Element.paddingEach 
                { top = 0
                , right = 0
                , bottom = 0
                , left = 44
                } 
            ] <| TopAppBar.title <| "Set " ++ String.fromInt model.set
        ]
    ]