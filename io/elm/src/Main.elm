module Main exposing (main)

import Browser
import Browser.Navigation as Nav
import Element exposing (Element, column, el, fill, layout, maximum, clip, px, width, height, centerX, centerY, link)
import Element.Background as Background
import Element.Border as Border
import Element.Events exposing (onClick)
import Element.Font as Font
import Html exposing (Html)
import Html.Attributes
import Material.Card as Card
import Material.Elevation as Elevation
import Material.Icons
import Material.TopAppBar as TopAppBar
import Scheme
import Theme exposing (Theme)
import Url exposing (Url)
import Url.Parser exposing (Parser, (</>), int, map, oneOf, s, string)

type Route
  = Scheme Int
  | Schemes

routeParser : Parser (Route -> a) a
routeParser =
  oneOf
    [ map Schemes   (s "")
    , map Scheme    (s "scheme" </> int)
    ]


main : Program () Model Msg
main =
    Browser.application
        { init = init
        , view = view
        , update = update
        , subscriptions = subscriptions
        , onUrlChange = UrlChanged
        , onUrlRequest = LinkClicked
        }

type Msg
    = LinkClicked Browser.UrlRequest
    | SwitchTheme
    | UrlChanged Url

type alias Model =
    { key : Nav.Key
    , url : Url
    , title : String
    , schemes : List Scheme.Scheme
    , theme : Theme
    }

defaults : Nav.Key -> Url -> Model
defaults key url =
    { key = key
    , url = url
    , title = "My schemes"
    , schemes = Scheme.mock
    , theme = Theme.dark
    }

init : () -> Url -> Nav.Key -> ( Model, Cmd Msg )
init _ url key =
  ( defaults key url, Cmd.none )


update : Msg -> Model -> ( Model, Cmd Msg )
update msg model =
    case msg of
        SwitchTheme ->
            ( { model | theme = Theme.switch model.theme.kind }, Cmd.none )
        LinkClicked urlRequest ->
            case urlRequest of
                Browser.Internal url ->
                    ( model, Nav.pushUrl model.key (Url.toString url) )

                Browser.External href ->
                    ( model, Nav.load href )

        UrlChanged url ->
            ( { model | url = url }
            , Cmd.none
            )


subscriptions : Model -> Sub Msg
subscriptions _ =
    Sub.none


view : Model -> Browser.Document Msg
view model =
    { title = "Furystark"
    , body = [ body model ]
    }


body : Model -> Html Msg
body model =
    layout
        [ Background.color model.theme.background
        , Font.family
            [ Font.typeface "Nunito"
            , Font.typeface "Roboto"
            , Font.typeface "Open Sans"
            , Font.sansSerif
            ]
        ]
    <|
        column
            [ width fill
            , height fill
            , Element.onRight <| fab model.theme
            ]
            [ TopAppBar.regular
                model.title
                (el [ onClick SwitchTheme, Element.htmlAttribute <| Html.Attributes.style "cursor" "pointer" ] <| Element.html Material.Icons.highlight)
                model.theme
            , column
                [ width <| maximum 1200 fill
                , centerX
                ]
                [ Card.view model.theme [ Scheme.list model.theme model.schemes ] ]
            ]


fab : Theme -> Element msg
fab theme =
    link 
        [ Element.htmlAttribute <| 
            Html.Attributes.style "position" "absolute"
        , Element.htmlAttribute <| 
            Html.Attributes.style "bottom" "32px"
        , Element.htmlAttribute <| 
                Html.Attributes.style "right" "32px"
        ]
        { url = "/add"
        , label =
            el 
                [ Border.rounded 50 
                , clip
                , Background.color theme.secondary
                , Font.color theme.onSecondary
                , width (px 56)
                , Element.height (px 56)
                , Elevation.z6
                
                ]
                <| el 
                    [ centerX
                    , centerY
                    ] 
                    <| Element.html Material.Icons.add
        }    

   
