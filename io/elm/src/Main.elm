module Main exposing(main)

import Browser
import Date exposing (Date)
import Element exposing (Element, el, fill, width, column, layout, padding)
import Element.Background as Background
import Element.Events exposing (onClick)
import Html exposing (Html)
import Html.Attributes
import Material.List as List
import Material.Icons
import Material.TopAppBar as TopAppBar
import Time
import Theme exposing (Theme)

schemeDate : Date
schemeDate =
    Date.fromPosix
        Time.utc
        (Time.millisToPosix (1583681692  * 1000))

type alias Scheme =
    { name : String
    , createdAt : Date
    }
    
main: Program () Model Msg
main = 
    Browser.document
        { init = init
        , view = view
        , update = update
        , subscriptions = subscriptions
        }

type Msg
    = SwitchTheme

type alias Model = 
    { title : String
    , schemes : List Scheme
    , theme : Theme
    }

init : () -> ( Model, Cmd Msg )
init _ =
    (
        { title = "My schemes"
        , schemes = 
            [ Scheme "Chest" schemeDate
            , Scheme "Back" schemeDate
            , Scheme "Legs" schemeDate
            , Scheme "Shoulders" schemeDate
            ]
        , theme = Theme.dark
        }
        , Cmd.none
    )

update : Msg -> Model -> (Model, Cmd Msg)
update msg model =
    case msg of
        SwitchTheme -> 
            ( { model | theme = switch model.theme }, Cmd.none )

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
        ]
        <| column 
            [ width fill
            ] 
            [ TopAppBar.regular 
                "My schemes" 
                (el [ onClick SwitchTheme, Element.htmlAttribute <| Html.Attributes.style "cursor" "pointer" ] <| Element.html Material.Icons.highlight) 
                model.theme
            , column [ width fill, padding 24 ] [ list model.theme model.schemes ]
            ]

list : Theme -> List Scheme -> Element msg
list theme schemes =
    List.twoLine theme <| List.map toTuple schemes

toTuple : Scheme -> (String, String)
toTuple scheme =
    (.name scheme, toDateString <| .createdAt scheme)

toDateString : Date -> String
toDateString date =
    Date.format "MMMM y" date 

switch : Theme -> Theme
switch theme =
    case theme.kind of
        Theme.Light -> Theme.dark
        Theme.Dark -> Theme.light