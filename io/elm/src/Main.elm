module Main exposing (main)

import Api
import Browser exposing (Document)
import Browser.Navigation as Nav
import Html
import Json.Decode exposing (Value)
import Page
import Page.Blank as Blank
import Page.Login as Login
import Page.NotFound as NotFound
import Page.Register as Register
import Page.Scheme.Create as CreateScheme
import Page.Scheme.Details as SchemeDetails
import Page.Scheme.List as SchemeList
import Route exposing (Route)
import Session exposing (Session)
import Theme exposing (Theme)
import Url exposing (Url)
import Viewer exposing (Viewer)



-- NOTE: Based on discussions around how asset management features
-- like code splitting and lazy loading have been shaping up, it's possible
-- that most of this file may become unnecessary in a future release of Elm.
-- Avoid putting things in this module unless there is no alternative!
-- See https://discourse.elm-lang.org/t/elm-spa-in-0-19/1800/2 for more.


type Model
    = Redirect Session
    | NotFound Session
    | Login Login.Model
    | Register Register.Model
    | SchemeList SchemeList.Model
    | CreateScheme CreateScheme.Model
    | Scheme SchemeDetails.Model



-- MODEL


init : Maybe Viewer -> Url -> Nav.Key -> ( Model, Cmd Msg )
init maybeViewer url navKey =
    changeRouteTo (Route.fromUrl url)
        (Redirect (Session.fromViewer navKey maybeViewer))



-- VIEW


view : Model -> Document Msg
view model =
    let
        viewPage toMsg config =
            let
                { title, body } =
                    Page.view config
            in
            { title = title
            , body = List.map (Html.map toMsg) body
            }
    in
    case model of
        Redirect _ ->
            Page.view Blank.view

        NotFound _ ->
            Page.view NotFound.view

        Login login ->
            viewPage GotLoginMsg (Login.view login)

        Register register ->
            viewPage GotRegisterMsg (Register.view register)

        SchemeList schemes ->
            viewPage GotSchemesMsg (SchemeList.view schemes)

        CreateScheme createScheme ->
            viewPage GotCreateSchemeMsg (CreateScheme.view createScheme)

        Scheme scheme ->
            viewPage GotSchemeMsg (SchemeDetails.view scheme)

-- UPDATE


type Msg
    = ChangedUrl Url
    | ClickedLink Browser.UrlRequest
    | GotLoginMsg Login.Msg
    | GotRegisterMsg Register.Msg
    | GotCreateSchemeMsg CreateScheme.Msg
    | GotSchemesMsg SchemeList.Msg
    | GotSchemeMsg SchemeDetails.Msg
    | GotSession Session


toSession : Model -> Session
toSession page =
    case page of
        Redirect session ->
            session

        NotFound session ->
            session

        Login login ->
            Login.toSession login

        Register register ->
            Register.toSession register

        CreateScheme createScheme ->
            CreateScheme.toSession createScheme

        SchemeList schemes ->
            SchemeList.toSession schemes

        Scheme scheme ->
            SchemeDetails.toSession scheme

toTheme : Model -> Theme
toTheme page =
    case page of
        Redirect _ ->
            Theme.dark

        NotFound _ ->
            Theme.dark

        Login _ ->
            Theme.dark

        Register _ ->
            Theme.dark

        CreateScheme createScheme ->
            CreateScheme.toTheme createScheme

        SchemeList schemes ->
            SchemeList.toTheme schemes

        Scheme scheme ->
            SchemeDetails.toTheme scheme

changeRouteTo : Maybe Route -> Model -> ( Model, Cmd Msg )
changeRouteTo maybeRoute model =
    let
        session =
            toSession model

        theme =
            toTheme model
    in
    case maybeRoute of
        Nothing ->
            ( NotFound session, Cmd.none )

        Just Route.Root ->
            ( model, Route.replaceUrl (Session.navKey session) Route.Schemes )

        Just Route.Logout ->
            ( model, Api.logout )

        Just Route.Login ->
            Login.init session
                |> updateWith Login GotLoginMsg model

        Just Route.Register ->
            Register.init session
                |> updateWith Register GotRegisterMsg model

        Just Route.Schemes ->
            SchemeList.init session theme
                |> updateWith SchemeList GotSchemesMsg model

        Just Route.CreateScheme ->
            CreateScheme.init session theme
                |> updateWith CreateScheme GotCreateSchemeMsg model

        Just (Route.Scheme id) ->
            SchemeDetails.init id session theme
                |> updateWith Scheme GotSchemeMsg model

update : Msg -> Model -> ( Model, Cmd Msg )
update msg model =
    case ( msg, model ) of
        ( ClickedLink urlRequest, _ ) ->
            case urlRequest of
                Browser.Internal url ->
                    case url.fragment of
                        Nothing ->
                            -- If we got a link that didn't include a fragment,
                            -- it's from one of those (href "") attributes that
                            -- we have to include to make the RealWorld CSS work.
                            --
                            -- In an application doing path routing instead of
                            -- fragment-based routing, this entire
                            -- `case url.fragment of` expression this comment
                            -- is inside would be unnecessary.
                            ( model, Cmd.none )

                        Just _ ->
                            ( model
                            , Nav.pushUrl (Session.navKey (toSession model)) (Url.toString url)
                            )

                Browser.External href ->
                    ( model
                    , Nav.load href
                    )

        ( ChangedUrl url, _ ) ->
            changeRouteTo (Route.fromUrl url) model

        ( GotLoginMsg subMsg, Login login ) ->
            Login.update subMsg login
                |> updateWith Login GotLoginMsg model

        ( GotRegisterMsg subMsg, Register register ) ->
            Register.update subMsg register
                |> updateWith Register GotRegisterMsg model

        ( GotSchemesMsg subMsg, SchemeList schemes ) ->
            SchemeList.update subMsg schemes
                |> updateWith SchemeList GotSchemesMsg model

        ( GotCreateSchemeMsg subMsg, CreateScheme createScheme ) ->
            CreateScheme.update subMsg createScheme
                |> updateWith CreateScheme GotCreateSchemeMsg model

        ( GotSchemeMsg subMsg, Scheme scheme ) ->
            SchemeDetails.update subMsg scheme
                |> updateWith Scheme GotSchemeMsg model

        ( GotSession session, Redirect _ ) ->
            ( Redirect session
            , Route.replaceUrl (Session.navKey session) Route.Schemes
            )

        ( _, _ ) ->
            -- Disregard messages that arrived for the wrong page.
            ( model, Cmd.none )


updateWith : (subModel -> Model) -> (subMsg -> Msg) -> Model -> ( subModel, Cmd subMsg ) -> ( Model, Cmd Msg )
updateWith toModel toMsg _ ( subModel, subCmd ) =
    ( toModel subModel
    , Cmd.map toMsg subCmd
    )



-- SUBSCRIPTIONS


subscriptions : Model -> Sub Msg
subscriptions model =
    case model of
        NotFound _ ->
            Sub.none

        Redirect _ ->
            Session.changes GotSession (Session.navKey (toSession model))

        Login login ->
            Sub.map GotLoginMsg (Login.subscriptions login)

        Register register ->
            Sub.map GotRegisterMsg (Register.subscriptions register)

        CreateScheme _ ->
            Sub.none

        SchemeList _ ->
            Sub.none

        Scheme _ ->
            Sub.none


-- MAIN


main : Program Value Model Msg
main =
    Api.application Viewer.decoder
        { init = init
        , onUrlChange = ChangedUrl
        , onUrlRequest = ClickedLink
        , subscriptions = subscriptions
        , update = update
        , view = view
        }
