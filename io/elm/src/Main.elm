module Main exposing (main)

import Browser
import Browser.Navigation as Nav
import Date exposing (Date)
import Element exposing (Element, column, el, fill, layout, maximum, clip, px, width, height, centerX, centerY)
import Element.Background as Background
import Element.Border as Border
import Element.Events exposing (onClick)
import Element.Font as Font
import Html exposing (Html)
import Html.Attributes
import Material.Card as Card
import Material.Elevation as Elevation
import Material.Icons
import Material.List as List
import Material.TopAppBar as TopAppBar
import Theme exposing (Theme)
import Time
import Url exposing (Url)


schemeDate : Date
schemeDate =
    Date.fromPosix
        Time.utc
        (Time.millisToPosix (1583681692 * 1000))


type alias Scheme =
    { id : String
    , name : String
    , createdAt : Date
    }


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
    , schemes : List Scheme
    , theme : Theme
    }

defaults : Nav.Key -> Url -> Model
defaults key url =
    { key = key
    , url = url
    , title = "My schemes"
    , schemes =
        [ Scheme "1" "Chest" schemeDate
        , Scheme "2" "Back" schemeDate
        , Scheme "3" "Legs" schemeDate
        , Scheme "4" "Shoulders" schemeDate
        ]
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
                [ Card.view model.theme [ list model.theme model.schemes ] ]
            ]


list : Theme -> List Scheme -> Element msg
list theme schemes =
    List.twoLine theme <| List.map toItem schemes


toItem : Scheme -> List.Item
toItem scheme =
    { first = scheme.name
    , second = toDateString <| .createdAt scheme
    , url = Just <| "/" ++ scheme.id
    }

toDateString : Date -> String
toDateString date =
    Date.format "MMMM y" date


fab : Theme -> Element msg
fab theme =
    el 
        [ Border.rounded 50 
        , clip
        , Background.color theme.secondary
        , Font.color theme.onSecondary
        , width (px 56)
        , Element.height (px 56)
        , Elevation.z6
        , Element.htmlAttribute <| 
            Html.Attributes.style "position" "absolute"
        , Element.htmlAttribute <| 
            Html.Attributes.style "bottom" "32px"
        , Element.htmlAttribute <| 
            Html.Attributes.style "right" "32px"
        ]
        <| el 
            [ centerX
            , centerY
            ] 
            <| Element.html Material.Icons.add
