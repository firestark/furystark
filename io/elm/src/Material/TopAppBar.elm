module Material.TopAppBar exposing (regular)

import Element exposing (Element, alignRight, el, fill, height, paddingEach, paddingXY, px, row, text, width)
import Element.Background as Background
import Element.Font as Font
import Html.Attributes
import Material.Elevation as Elevation
import Theme exposing (Theme)


regular : String -> Element msg -> Theme -> Element msg
regular title icon theme =
    row
        [ width fill
        , height (px 64)
        , paddingXY 8 12
        , Background.color theme.primary
        , Font.color theme.onPrimary
        , Elevation.z1
        , Element.htmlAttribute <|
            Html.Attributes.style "z-index" "100"
        ]
        [ titleEl title
        , el [ alignRight, Font.color theme.onPrimary, paddingXY 12 0 ] icon
        ]


titleEl : String -> Element msg
titleEl txt =
    el
        [ paddingEach
            { top = 0
            , right = 0
            , bottom = 0
            , left = 20
            }
        , Font.semiBold
        ]
        (text txt)