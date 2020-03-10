module Scheme exposing (Scheme, list, mock)

import Date exposing (Date)
import Element exposing (Element)
import Material.List as List
import Theme exposing (Theme)
import Time


type alias Scheme =
    { id : String
    , name : String
    , createdAt : Date
    }

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



schemeDate : Date
schemeDate =
    Date.fromPosix
        Time.utc
        (Time.millisToPosix (1583681692 * 1000))

mock : List Scheme
mock =
    [ Scheme "1" "Chest" schemeDate
    , Scheme "2" "Back" schemeDate
    , Scheme "3" "Legs" schemeDate
    , Scheme "4" "Shoulders" schemeDate
    ]