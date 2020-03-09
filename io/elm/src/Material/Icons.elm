module Material.Icons exposing (add, highlight)

import Html exposing (Html)
import Svg exposing (g, rect, svg)
import Svg.Attributes exposing (d, enableBackground, fill, height, viewBox, width)


highlight : Html msg
highlight =
    svg
        [ enableBackground "new 0 0 24 24", height "24", width "24", viewBox "0 0 24 24", fill "currentColor" ]
        [ g [] [ rect [ fill "none", height "24", width "24" ] [] ], g [] [ g [] [ g [] 
            [ Svg.path 
                [ d """M6,14l3,3v5h6v-5l3-3V9H6V14z M11,2h2v3h-2V2z M3.5,5.88l1.41-1.41l2.12,2.12L5.62,8L3.5,5.88z 
                    M16.96,6.59l2.12-2.12 l1.41,1.41L18.38,8L16.96,6.59z"""
                ] [] ] ] ] 
        ]


add : Html msg
add =
    svg [ height "24", viewBox "0 0 24 24", width "24" ] [ Svg.path [ d "M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" ] [], Svg.path [ d "M0 0h24v24H0z", fill "none" ] [] ]
