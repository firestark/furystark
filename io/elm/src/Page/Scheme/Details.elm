module Page.Scheme.Details exposing (Msg, Model, toSession, view, update, init, toTheme)

import Date
import Element exposing (Element, centerX, column, fill, height, maximum, paddingEach, paddingXY, scrollbarY, width)
import Element.Events exposing (onClick)
import Element.Font as Font
import Html exposing (Html)
import Material.Fab as Fab
import Material.Icons
import Material.List
import Material.TopAppBar as TopAppBar
import Material.UpArrow as UpArrow
import Page
import Page.Scheme.Session as Session
import Route
import Scheme exposing (Scheme)
import Session exposing (Session)
import Theme exposing (Theme)


type alias Model =
    { theme : Theme
    , scheme : Scheme
    , session : Session
    , page : Page
    , sessionPage : Session.Model
    }

type Page
    = Details
    | Session

type Msg
    = PageSwitched Page
    | GotSessionMsg Session.Msg
    | SessionDeletePressed Int
    | SessionPressed Int

init : String -> Session -> Theme -> ( Model, Cmd Msg )
init id session theme =
    let sessionPage = Session.init theme (Scheme.mock id) Nothing
    in
        ( { theme = theme
        , scheme = Scheme.mock id
        , session = session
        , page = Details
        , sessionPage = Tuple.first sessionPage
        }
        , Cmd.map GotSessionMsg (Tuple.second sessionPage)
        )

update : Msg -> Model -> ( Model, Cmd Msg )
update msg model =
    case msg of
        PageSwitched page ->
            ( { model | page = page }, Cmd.none )

        GotSessionMsg subMsg ->
            case subMsg of
                Session.FinishPressed ->
                    let session = createSession model.sessionPage
                        scheme = model.scheme
                        newScheme = { scheme | sessions = Scheme.add session scheme.sessions }
                        newModel = { model | scheme = newScheme }
                    in update (PageSwitched Details) newModel 
                
                _ ->
                    ( { model | sessionPage = Session.update subMsg model.sessionPage }, Cmd.none )

        SessionDeletePressed id ->
            let scheme = model.scheme
                newScheme = { scheme | sessions = Scheme.remove id scheme.sessions }
            in
                ({ model | scheme = newScheme }, Cmd.none)

        SessionPressed id ->
            let maybeSession = findById id model.scheme.sessions
                newModel = { model | sessionPage = Tuple.first <| Session.init model.theme model.scheme maybeSession }
            in update (PageSwitched Session) newModel

findById : Int -> List (Int, Scheme.Session) -> Maybe (Int, Scheme.Session)
findById id sessions =
    List.head <| List.filter (isId id) sessions

isId : Int -> (Int, Scheme.Session) -> Bool
isId findId (id, _) =
    findId == id

createSession : Session.Model -> Scheme.Session
createSession model =
    { date = model.date
    , completions = model.completions
    }


toSession : Model -> Session
toSession model =
    model.session

toTheme : Model -> Theme
toTheme model =
    model.theme

view : Model -> { title : String, content : Html Msg }
view model =
    { title = "Scheme details"
    , content = body model
    }

body : Model -> Html Msg
body model =
    case model.page of
        Details -> detailsBody model
        Session -> Html.map GotSessionMsg (Session.view model.sessionPage)

detailsBody : Model -> Html Msg
detailsBody model =
    Page.wrapper model.theme.background
    <|
        column
            [ width fill
            , height fill
            , Element.onRight <| fab model.theme
            ]
            [ topAppBar model.theme model.scheme.name
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
                [ list model.theme <| List.map toItem model.scheme.sessions
                ]
            ]

topAppBar : Theme -> String -> Element msg
topAppBar theme title =
    TopAppBar.row theme
        [ UpArrow.view (UpArrow.Route Route.Schemes)
        , TopAppBar.title title
        , TopAppBar.iconButton [] Material.Icons.edit
        ]

fab : Theme -> Element Msg
fab theme =
    Element.el 
        (List.append [ onClick (PageSwitched Session) ] Fab.bottomRight)
        (Fab.regular theme Material.Icons.play_arrow)

------------------------------------------------------------------------------------
-- List
------------------------------------------------------------------------------------

type alias Item =
    { id : Int
    , first : String
    , url : Maybe String
    }

toItem : (Int, Scheme.Session) -> Item
toItem (id, session) =
    { id = id
    , first = Date.format "EEEE, d MMMM y" session.date
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
        [ onClick (SessionPressed item.id)
        ]
        [ Material.List.text theme item.first
        , Material.List.icon theme [ onClick (SessionDeletePressed item.id) ] Material.Icons.delete
        ]