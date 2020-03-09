module Theme exposing (Theme, Kind(..), light, dark, highlight)

import Element exposing (Color, rgb255, rgba255)
import Material.Color

type Kind
    = Light
    | Dark

type alias Theme =
    { kind : Kind
    , primary : Color
    , secondary : Color
    , background : Color
    , onPrimary : Color
    , onSecondary : Color
    , onBackground : Color
    }

light : Theme
light =
    { kind = Light
    , primary = Material.Color.red500
    , secondary = Material.Color.lime500
    , background =  rgb255 229 229 229
    , onPrimary = Material.Color.white
    , onSecondary = Material.Color.black
    , onBackground = Material.Color.black
    }
    
dark : Theme
dark =
    { kind = Dark
    , primary = Material.Color.red500
    , secondary = Material.Color.lime500
    , background =  rgb255 29 29 29
    , onPrimary = Material.Color.white
    , onSecondary = Material.Color.black
    , onBackground = Material.Color.white
    }


highlight : Kind -> Float -> Color
highlight kind alpha =
    case kind of
        Light -> rgba255 0 0 0 alpha
        Dark -> rgba255 255 255 255 alpha