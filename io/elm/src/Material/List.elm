module Material.List exposing (singleLine, twoLine, Item)

import Element exposing (Element, fill, width, height, px, column, paddingXY, el, row, mouseOver, centerY)
import Element.Background as Background
import Element.Font as Font
import Html.Attributes
import Theme exposing (Theme)

type alias Item =
    { first : String
    , second : String
    , url : Maybe String
    }

singleLine : List String -> Theme -> Element msg
singleLine texts theme =
    column 
        [ width fill
        , Font.color theme.onBackground
        , paddingXY 0 8
        ]
        <| List.map (element theme) texts

twoLine : Theme -> List Item -> Element msg
twoLine theme item =
    column 
        [ width fill
        , Font.color theme.onBackground
        , paddingXY 0 8
        ]
        <| List.map (twoLineElement theme) item  


twoLineElement : Theme -> Item -> Element msg
twoLineElement theme item =
    case item.url of
        Nothing ->
            twoElement theme item.first item.second
        Just url ->
            Element.link 
                [ width fill ]
                { url = url
                , label = twoElement theme item.first item.second
                }    

element : Theme -> String -> Element msg
element theme text =
    row 
        [ width fill
        , height (px 48)
        , Font.size 16
        , centerY
        , paddingXY 16 0
        , Element.htmlAttribute <| Html.Attributes.style "cursor" "pointer"
        , mouseOver 
            [ Background.color <| Theme.highlight theme.kind 0.04 
            ]
        ] 
        [ el 
            [ Element.centerY
            ] <| Element.text text
        ]

twoElement : Theme -> String -> String -> Element msg
twoElement theme text1 text2 =
    column 
        [ width fill
        , height (px 72)
        , paddingXY 16 0
        , Element.spacingXY 0 4
        , Element.htmlAttribute <| Html.Attributes.style "cursor" "pointer"
        , Element.focused
            [ Background.color <| Theme.highlight theme.kind 0.12
            ]
        , Element.mouseDown
            [ Background.color <| Theme.highlight theme.kind 0.16
            ]
        , mouseOver
            [ Background.color <| Theme.highlight theme.kind 0.04 
            ]
        ] 
        [ row 
            [ width fill
            , Font.size 16
            , centerY   
            ] 
            [ el 
                [ Element.centerY
                ] <| Element.text text1
            ]
        , row 
            [ width fill
            , Font.size 14
            , Font.color <| Theme.highlight theme.kind 0.54
            , centerY
            ] 
            [ el 
                [ Element.centerY
                ] <| Element.text text2
            ]
        ]