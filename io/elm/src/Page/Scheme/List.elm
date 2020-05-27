module Page.Scheme.List exposing (Model, Msg, toSession, init, update, view, toTheme)

import Date exposing (Date)
import Element exposing (Element, centerX, centerY, column, el, fill, height, link, maximum, paddingXY, px, scrollbarY, text, width)
import Element.Events exposing (onClick)
import Element.Font as Font
import Html exposing (Html)
import Material.Fab as Fab
import Material.Icons
import Material.TopAppBar as TopAppBar
import Page
import Route
import Scheme exposing (Scheme)
import Session exposing (Session)
import Theme exposing (Theme)

type alias Model =
    { theme : Theme
    , schemes : List Scheme
    , sortedSchemes : List (Date, List Scheme)
    , session : Session
    }


type Msg
    = SwitchTheme


init : Session -> Theme -> ( Model, Cmd Msg )
init session theme =
    ( { theme = theme
      , schemes = Scheme.mocks
      , sortedSchemes = Scheme.groupSchemes Scheme.mocks
      , session = session
      }
    , Cmd.none
    )

update : Msg -> Model -> ( Model, Cmd Msg )
update msg model =
    case msg of
        SwitchTheme ->
            ( { model | theme = Theme.switch model.theme.kind }, Cmd.none )


toSession : Model -> Session
toSession model =
    model.session

toTheme : Model -> Theme
toTheme model =
    model.theme


view : Model -> { title : String, content : Html Msg }
view model =
    { title = "Schemes"
    , content = body model
    }

body : Model -> Html Msg
body model =
    Page.wrapper model.theme.background
    <|
        column
            [ width fill
            , height fill
            , Element.onRight <| fab model.theme
            ]
            [ topAppBar model.theme
            , column
                [ width <| maximum 1200 fill
                , height fill
                , centerX
                , scrollbarY
                , Element.paddingEach
                    { top = 0
                    , right = 0
                    , bottom = 72
                    , left = 0
                    }
                ]
                <| List.map (list model.theme) model.sortedSchemes                     
            ]

fab : Theme -> Element msg
fab theme =
    link 
        Fab.bottomRight
        { url = Route.routeToString Route.CreateScheme
        , label = Fab.regular theme Material.Icons.add
        }

topAppBar : Theme -> Element Msg
topAppBar theme =
    TopAppBar.row theme
        [ TopAppBar.title "Schemes"
        , TopAppBar.iconButton 
            [ onClick SwitchTheme ] 
            Material.Icons.highlight
        ]

list : Theme -> (Date, List Scheme) -> Element msg
list theme (date, schemes) =
    column [ width fill ]
        [ el 
            [ height (px 48)
            , paddingXY 16 0
            ] <|
            el 
                [ Font.size 14
                , Font.color <| Theme.highlight theme.kind 0.54
                , Font.bold
                , centerY
                ] 
                <| text <| Scheme.toDateString date
        , Scheme.list theme schemes
        ]