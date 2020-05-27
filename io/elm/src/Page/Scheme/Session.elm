module Page.Scheme.Session exposing (Model, Msg(..), init, update, view)

import Array
import Date exposing (Date)
import Element exposing (Color, Element, centerX, column, el, fill, height, maximum, paddingEach, paddingXY, scrollbarY, width)
import Element.Events exposing (onClick)
import Element.Font as Font
import Exercise exposing (Exercise)
import Html exposing (Html)
import Material.Color
import Material.Icons as Icon
import Material.List
import Material.TopAppBar as TopAppBar
import Material.UpArrow as UpArrow
import Page
import Page.Scheme.Exercise.Completion as Completion
import Route
import Scheme exposing (Scheme)
import Task
import Time exposing (Month(..))
import Theme exposing (Theme)

type Page
    = ExercisesList
    | ExerciseCompletion

type alias Completion = (Exercise, List Int)

type alias Model =
    { theme : Theme
    , scheme : Scheme
    , sessionNumber : Int
    , page : Page
    , completionModel : Maybe Completion.Model
    , completions : List Completion
    , date : Date
    }

init : Theme -> Scheme -> Maybe (Int, Scheme.Session) -> (Model, Cmd Msg)
init theme scheme maybeSession =
    case maybeSession of
        Nothing -> (defaults theme scheme, Date.today |> Task.perform ReceivedDate)
        Just session -> (fromSession theme scheme session, Cmd.none)

fromSession : Theme -> Scheme -> (Int, Scheme.Session) -> Model
fromSession theme scheme (id, session) =
    { theme = theme
    , scheme = scheme
    , sessionNumber = id
    , page = ExercisesList
    , completionModel = Nothing
    , completions = session.completions
    , date = session.date
    }

defaults : Theme -> Scheme -> Model
defaults theme scheme =
    { theme = theme
    , scheme = scheme
    , sessionNumber = List.length scheme.sessions + 1
    , page = ExercisesList
    , completionModel = Nothing
    , completions = []
    , date = Date.fromCalendarDate 2020 Jan 1
    }

type Msg
    = ExercisePressed Int
    | PageSwitched Page
    | GotCompletionMsg Completion.Msg
    | ReceivedDate Date
    | FinishPressed

update : Msg -> Model -> Model
update msg model =
    case msg of        
        ExercisePressed id ->
            case List.head (List.filter (findById id) model.scheme.exercises) of
                Nothing ->
                    model
                Just (_, exercise) ->
                    let completions = findExerciseCompletions model.completions exercise
                        values = case completions of
                            Nothing -> List.repeat exercise.sets 0
                            Just completion -> Tuple.second completion
                        modelWithCompletionModel = { model | completionModel = Just <| Completion.init model.theme exercise values }
                    in update (PageSwitched ExerciseCompletion) modelWithCompletionModel
        
        PageSwitched page ->
            { model | page = page }
        
        GotCompletionMsg subMsg ->
            case subMsg of
                Completion.UpArrowPressed ->
                    update (PageSwitched ExercisesList) model

                Completion.FinishPressed ->
                    case model.completionModel of
                        Nothing -> model
                        Just theModel ->
                            let completions = List.append model.completions [ (theModel.exercise, Array.toList theModel.values) ]
                                newModel = { model | completions = completions }
                            in update (PageSwitched ExercisesList) newModel
                _ ->
                    case model.completionModel of
                        Just theModel ->
                            { model | completionModel = Just <| Completion.update subMsg theModel }
                        Nothing ->
                            model
        ReceivedDate date ->
            { model | date = date }

        FinishPressed ->
            model

findExerciseCompletions : List Completion -> Exercise -> Maybe Completion
findExerciseCompletions completions exercise =
    List.head <| List.filter (\ (completionExercise, _) -> completionExercise.name == exercise.name) completions

findById : Int -> (Int, Exercise) -> Bool
findById findId (hasId, _) =
    findId == hasId

view : Model -> Html Msg
view model =
    case model.page of
        ExercisesList -> exerciseListBody model
        ExerciseCompletion ->
            case model.completionModel of
                Nothing -> exerciseListBody model
                Just theModel -> Html.map GotCompletionMsg <| Completion.view theModel
     
exerciseListBody : Model -> Html Msg
exerciseListBody model =
    Page.wrapper model.theme.background
    <|
        column
            [ width fill
            , height fill
            ]
            [ topAppBar model
            , column
                [ width <| maximum 1200 fill
                , height fill
                , centerX
                , scrollbarY
                , paddingEach
                    { top = 0
                    , right = 16
                    , bottom = 72
                    , left = 16
                    }
                ]
                [ list model.theme <| List.map (toItem model.completions) model.scheme.exercises
                ]
            ]

topAppBar : Model -> Element Msg
topAppBar model =
    TopAppBar.row model.theme
        [ UpArrow.view (UpArrow.Route <| Route.Scheme model.scheme.id)
        , TopAppBar.title <| "Session " ++ String.fromInt model.sessionNumber
        , TopAppBar.iconButton [ onClick FinishPressed ] Icon.check
        ]

------------------------------------------------------------------------------------
-- List
------------------------------------------------------------------------------------

type alias Item =
    { id : Int
    , first : String
    , url : Maybe String
    , isDone : Bool
    }

toItem : List Completion -> (Int, Exercise) -> Item
toItem completions (id, exercise) =
    { id = id
    , first = exercise.name
    , url = Nothing
    , isDone = completionsHas completions exercise
    }

completionsHas : List Completion -> Exercise -> Bool
completionsHas completions exercise =
    let item = List.head <| List.filter (isCompleted exercise) completions
    in case item of
       Nothing -> False
       Just _ -> True

isCompleted : Exercise -> Completion -> Bool
isCompleted exercise (completedExercise, _) =
    completedExercise.name == exercise.name

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
    el [ onClick (ExercisePressed item.id), width fill ] <|
        Material.List.singleElement
            []
            [ Material.List.icon theme [ Font.color (checkColor theme item.isDone) ] Icon.check
            , Material.List.text theme item.first
            ]

checkColor : Theme -> Bool -> Color
checkColor theme isDone =
    if isDone then
        Material.Color.lime500
    else
        Theme.highlight theme.kind 0.44