<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/fav/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
<header role="banner" id="fh5co-header">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse"
                       data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand" href="/">YourRadioBots</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<section id="fh5co-home" data-section="home" style="background-image: url({{asset('frontend/images/background.png')}});"
         data-stellar-background-ratio="0.5">
    <div class="gradient"></div>
    <div class="container">
        <div class="text-wrap">
            <div class="text-inner">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h1 class="animate-box"><span class="big">YourRadioBots</span></h1>
                        <h2 class="animate-box">Und die Konkurrenz steht im Schatten!</h2>
                        <div class="call-to-action">
                            <a href="{{route('dashboard')}}" class="demo animate-box"><i class="icon-paper-plane-o"></i>
                                Interface</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fh5co-services" style="text-align: center; margin: 10%; margin-top: 0">
    <h1>Datenschutzerkl&auml;rung</h1>
    <h2>1. Datenschutz auf einen Blick</h2>
    <h3>Allgemeine Hinweise</h3> <p>Die folgenden Hinweise geben einen einfachen &Uuml;berblick dar&uuml;ber, was mit Ihren personenbezogenen Daten passiert, wenn Sie unsere Website besuchen. Personenbezogene Daten sind alle Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Ausf&uuml;hrliche Informationen zum Thema Datenschutz entnehmen Sie unserer unter diesem Text aufgef&uuml;hrten Datenschutzerkl&auml;rung.</p>
    <h3>Datenerfassung auf unserer Website</h3> <p><strong>Wer ist verantwortlich f&uuml;r die Datenerfassung auf dieser Website?</strong></p> <p>Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen Kontaktdaten k&ouml;nnen Sie dem Impressum dieser Website entnehmen.</p> <p><strong>Wie erfassen wir Ihre Daten?</strong></p> <p>Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen. Hierbei kann es sich z.&nbsp;B. um Daten handeln, die Sie in ein Kontaktformular eingeben.</p> <p>Andere Daten werden automatisch beim Besuch der Website durch unsere IT-Systeme erfasst. Das sind vor allem technische Daten (z.&nbsp;B. Internetbrowser, Betriebssystem oder Uhrzeit des Seitenaufrufs). Die Erfassung dieser Daten erfolgt automatisch, sobald Sie unsere Website betreten.</p> <p><strong>Wof&uuml;r nutzen wir Ihre Daten?</strong></p> <p>Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu gew&auml;hrleisten. Andere Daten k&ouml;nnen zur Analyse Ihres Nutzerverhaltens verwendet werden.</p> <p><strong>Welche Rechte haben Sie bez&uuml;glich Ihrer Daten?</strong></p> <p>Sie haben jederzeit das Recht unentgeltlich Auskunft &uuml;ber Herkunft, Empf&auml;nger und Zweck Ihrer gespeicherten personenbezogenen Daten zu erhalten. Sie haben au&szlig;erdem ein Recht, die Berichtigung, Sperrung oder L&ouml;schung dieser Daten zu verlangen. Hierzu sowie zu weiteren Fragen zum Thema Datenschutz k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden. Des Weiteren steht Ihnen ein Beschwerderecht bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde zu.</p> <p>Au&szlig;erdem haben Sie das Recht, unter bestimmten Umst&auml;nden die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Details hierzu entnehmen Sie der Datenschutzerkl&auml;rung unter &bdquo;Recht auf Einschr&auml;nkung der Verarbeitung&ldquo;.</p>
    <h3>Analyse-Tools und Tools von Drittanbietern</h3> <p>Beim Besuch unserer Website kann Ihr Surf-Verhalten statistisch ausgewertet werden. Das geschieht vor allem mit Cookies und mit sogenannten Analyseprogrammen. Die Analyse Ihres Surf-Verhaltens erfolgt in der Regel anonym; das Surf-Verhalten kann nicht zu Ihnen zur&uuml;ckverfolgt werden.</p> <p>Sie k&ouml;nnen dieser Analyse widersprechen oder sie durch die Nichtbenutzung bestimmter Tools verhindern. Detaillierte Informationen zu diesen Tools und &uuml;ber Ihre Widerspruchsm&ouml;glichkeiten finden Sie in der folgenden Datenschutzerkl&auml;rung.</p>
    <h2>2. Allgemeine Hinweise und Pflichtinformationen</h2>
    <h3>Datenschutz</h3> <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer pers&ouml;nlichen Daten sehr ernst. Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerkl&auml;rung.</p> <p>Wenn Sie diese Website benutzen, werden verschiedene personenbezogene Daten erhoben. Personenbezogene Daten sind Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Die vorliegende Datenschutzerkl&auml;rung erl&auml;utert, welche Daten wir erheben und wof&uuml;r wir sie nutzen. Sie erl&auml;utert auch, wie und zu welchem Zweck das geschieht.</p> <p>Wir weisen darauf hin, dass die Daten&uuml;bertragung im Internet (z.&nbsp;B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen kann. Ein l&uuml;ckenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht m&ouml;glich.</p>
    <h3>Hinweis zur verantwortlichen Stelle</h3> <p>Die verantwortliche Stelle f&uuml;r die Datenverarbeitung auf dieser Website ist:</p> <p>Kevin Schwarz Einzelunternehmen<br />
        Kevin Schwarz<br />
        Maximilianstra&szlig;e 1<br />
        75172 Pforzheim</p>

    <p>Telefon: 072317760817<br />
        E-Mail: no-reply@yourradiobots.eu</p>
    <p>Verantwortliche Stelle ist die nat&uuml;rliche oder juristische Person, die allein oder gemeinsam mit anderen &uuml;ber die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z.&nbsp;B. Namen, E-Mail-Adressen o. &Auml;.) entscheidet.</p>
    <h3>Widerruf Ihrer Einwilligung zur Datenverarbeitung</h3> <p>Viele Datenverarbeitungsvorg&auml;nge sind nur mit Ihrer ausdr&uuml;cklichen Einwilligung m&ouml;glich. Sie k&ouml;nnen eine bereits erteilte Einwilligung jederzeit widerrufen. Dazu reicht eine formlose Mitteilung per E-Mail an uns. Die Rechtm&auml;&szlig;igkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unber&uuml;hrt.</p>
    <h3>Widerspruchsrecht gegen die Datenerhebung in besonderen F&auml;llen sowie gegen Direktwerbung (Art. 21 DSGVO)</h3> <p><strong>Wenn die Datenverarbeitung auf Grundlage von Art. 6 Abs. 1 lit. e oder f DSGVO erfolgt, haben Sie jederzeit das Recht, aus Gr&uuml;nden, die sich aus Ihrer besonderen Situation ergeben, gegen die Verarbeitung Ihrer personenbezogenen Daten Widerspruch einzulegen; dies gilt auch f&uuml;r ein auf diese Bestimmungen gest&uuml;tztes Profiling. Die jeweilige Rechtsgrundlage, auf denen eine Verarbeitung beruht, entnehmen Sie dieser Datenschutzerkl&auml;rung. Wenn Sie Widerspruch einlegen, werden wir Ihre betroffenen personenbezogenen Daten nicht mehr verarbeiten, es sei denn, wir k&ouml;nnen zwingende schutzw&uuml;rdige Gr&uuml;nde f&uuml;r die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten &uuml;berwiegen oder die Verarbeitung dient der Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen (Widerspruch nach Art. 21 Abs. 1 DSGVO).</strong></p> <p><strong>Werden Ihre personenbezogenen Daten verarbeitet, um Direktwerbung zu betreiben, so haben Sie das Recht, jederzeit Widerspruch gegen die Verarbeitung Sie betreffender personenbezogener Daten zum Zwecke derartiger Werbung einzulegen; dies gilt auch f&uuml;r das Profiling, soweit es mit solcher Direktwerbung in Verbindung steht. Wenn Sie widersprechen, werden Ihre personenbezogenen Daten anschlie&szlig;end nicht mehr zum Zwecke der Direktwerbung verwendet (Widerspruch nach Art. 21 Abs. 2 DSGVO).</strong></p>
    <h3>Beschwerderecht bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde</h3> <p>Im Falle von Verst&ouml;&szlig;en gegen die DSGVO steht den Betroffenen ein Beschwerderecht bei einer Aufsichtsbeh&ouml;rde, insbesondere in dem Mitgliedstaat ihres gew&ouml;hnlichen Aufenthalts, ihres Arbeitsplatzes oder des Orts des mutma&szlig;lichen Versto&szlig;es zu. Das Beschwerderecht besteht unbeschadet anderweitiger verwaltungsrechtlicher oder gerichtlicher Rechtsbehelfe.</p>
    <h3>Recht auf Daten&uuml;bertragbarkeit</h3> <p>Sie haben das Recht, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erf&uuml;llung eines Vertrags automatisiert verarbeiten, an sich oder an einen Dritten in einem g&auml;ngigen, maschinenlesbaren Format aush&auml;ndigen zu lassen. Sofern Sie die direkte &Uuml;bertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.</p>
    <h3>SSL- bzw. TLS-Verschl&uuml;sselung</h3> <p>Diese Seite nutzt aus Sicherheitsgr&uuml;nden und zum Schutz der &Uuml;bertragung vertraulicher Inhalte, wie zum Beispiel Bestellungen oder Anfragen, die Sie an uns als Seitenbetreiber senden, eine SSL-bzw. TLS-Verschl&uuml;sselung. Eine verschl&uuml;sselte Verbindung erkennen Sie daran, dass die Adresszeile des Browsers von &bdquo;http://&ldquo; auf &bdquo;https://&ldquo; wechselt und an dem Schloss-Symbol in Ihrer Browserzeile.</p> <p>Wenn die SSL- bzw. TLS-Verschl&uuml;sselung aktiviert ist, k&ouml;nnen die Daten, die Sie an uns &uuml;bermitteln, nicht von Dritten mitgelesen werden.</p>
    <h3>Auskunft, Sperrung, L&ouml;schung und Berichtigung</h3> <p>Sie haben im Rahmen der geltenden gesetzlichen Bestimmungen jederzeit das Recht auf unentgeltliche Auskunft &uuml;ber Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empf&auml;nger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder L&ouml;schung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden.</p>
    <h3>Recht auf Einschr&auml;nkung der Verarbeitung</h3> <p>Sie haben das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Hierzu k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden. Das Recht auf Einschr&auml;nkung der Verarbeitung besteht in folgenden F&auml;llen:</p> <ul> <li>Wenn Sie die Richtigkeit Ihrer bei uns gespeicherten personenbezogenen Daten bestreiten, ben&ouml;tigen wir in der Regel Zeit, um dies zu &uuml;berpr&uuml;fen. F&uuml;r die Dauer der Pr&uuml;fung haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> <li>Wenn die Verarbeitung Ihrer personenbezogenen Daten unrechtm&auml;&szlig;ig geschah/geschieht, k&ouml;nnen Sie statt der L&ouml;schung die Einschr&auml;nkung der Datenverarbeitung verlangen.</li> <li>Wenn wir Ihre personenbezogenen Daten nicht mehr ben&ouml;tigen, Sie sie jedoch zur Aus&uuml;bung, Verteidigung oder Geltendmachung von Rechtsanspr&uuml;chen ben&ouml;tigen, haben Sie das Recht, statt der L&ouml;schung die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> <li>Wenn Sie einen Widerspruch nach Art. 21 Abs. 1 DSGVO eingelegt haben, muss eine Abw&auml;gung zwischen Ihren und unseren Interessen vorgenommen werden. Solange noch nicht feststeht, wessen Interessen &uuml;berwiegen, haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li> </ul> <p>Wenn Sie die Verarbeitung Ihrer personenbezogenen Daten eingeschr&auml;nkt haben, d&uuml;rfen diese Daten &ndash; von ihrer Speicherung abgesehen &ndash; nur mit Ihrer Einwilligung oder zur Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen oder zum Schutz der Rechte einer anderen nat&uuml;rlichen oder juristischen Person oder aus Gr&uuml;nden eines wichtigen &ouml;ffentlichen Interesses der Europ&auml;ischen Union oder eines Mitgliedstaats verarbeitet werden.</p>
    <h2>3. Datenerfassung auf unserer Website</h2>
    <h3>Cookies</h3> <p>Die Internetseiten verwenden teilweise so genannte Cookies. Cookies richten auf Ihrem Rechner keinen Schaden an und enthalten keine Viren. Cookies dienen dazu, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen. Cookies sind kleine Textdateien, die auf Ihrem Rechner abgelegt werden und die Ihr Browser speichert.</p> <p>Die meisten der von uns verwendeten Cookies sind so genannte &bdquo;Session-Cookies&ldquo;. Sie werden nach Ende Ihres Besuchs automatisch gel&ouml;scht. Andere Cookies bleiben auf Ihrem Endger&auml;t gespeichert bis Sie diese l&ouml;schen. Diese Cookies erm&ouml;glichen es uns, Ihren Browser beim n&auml;chsten Besuch wiederzuerkennen.</p> <p>Sie k&ouml;nnen Ihren Browser so einstellen, dass Sie &uuml;ber das Setzen von Cookies informiert werden und Cookies nur im Einzelfall erlauben, die Annahme von Cookies f&uuml;r bestimmte F&auml;lle oder generell ausschlie&szlig;en sowie das automatische L&ouml;schen der Cookies beim Schlie&szlig;en des Browser aktivieren. Bei der Deaktivierung von Cookies kann die Funktionalit&auml;t dieser Website eingeschr&auml;nkt sein.</p> <p>Cookies, die zur Durchf&uuml;hrung des elektronischen Kommunikationsvorgangs oder zur Bereitstellung bestimmter, von Ihnen erw&uuml;nschter Funktionen (z.&nbsp;B. Warenkorbfunktion) erforderlich sind, werden auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO gespeichert. Der Websitebetreiber hat ein berechtigtes Interesse an der Speicherung von Cookies zur technisch fehlerfreien und optimierten Bereitstellung seiner Dienste. Soweit andere Cookies (z.&nbsp;B. Cookies zur Analyse Ihres Surfverhaltens) gespeichert werden, werden diese in dieser Datenschutzerkl&auml;rung gesondert behandelt.</p>
    <h3>Server-Log-Dateien</h3> <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log-Dateien, die Ihr Browser automatisch an uns &uuml;bermittelt. Dies sind:</p> <ul> <li>Browsertyp und Browserversion</li> <li>verwendetes Betriebssystem</li> <li>Referrer URL</li> <li>Hostname des zugreifenden Rechners</li> <li>Uhrzeit der Serveranfrage</li> <li>IP-Adresse</li> </ul> <p>Eine Zusammenf&uuml;hrung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.</p> <p>Die Erfassung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein berechtigtes Interesse an der technisch fehlerfreien Darstellung und der Optimierung seiner Website &ndash; hierzu m&uuml;ssen die Server-Log-Files erfasst werden.</p>
    <h3>Kontaktformular</h3> <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der Anfrage und f&uuml;r den Fall von Anschlussfragen bei uns gespeichert. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.</p> <p>Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt somit ausschlie&szlig;lich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Sie k&ouml;nnen diese Einwilligung jederzeit widerrufen. Dazu reicht eine formlose Mitteilung per E-Mail an uns. Die Rechtm&auml;&szlig;igkeit der bis zum Widerruf erfolgten Datenverarbeitungsvorg&auml;nge bleibt vom Widerruf unber&uuml;hrt.</p> <p>Die von Ihnen im Kontaktformular eingegebenen Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihrer Anfrage). Zwingende gesetzliche Bestimmungen &ndash; insbesondere Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
    <h3>Anfrage per E-Mail, Telefon oder Telefax</h3> <p>Wenn Sie uns per E-Mail, Telefon oder Telefax kontaktieren, wird Ihre Anfrage inklusive aller daraus hervorgehenden personenbezogenen Daten (Name, Anfrage) zum Zwecke der Bearbeitung Ihres Anliegens bei uns gespeichert und verarbeitet. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.</p> <p>Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO, sofern Ihre Anfrage mit der Erf&uuml;llung eines Vertrags zusammenh&auml;ngt oder zur Durchf&uuml;hrung vorvertraglicher Ma&szlig;nahmen erforderlich ist. In allen &uuml;brigen F&auml;llen beruht die Verarbeitung auf Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO) und/oder auf unseren berechtigten Interessen (Art. 6 Abs. 1 lit. f DSGVO), da wir ein berechtigtes Interesse an der effektiven Bearbeitung der an uns gerichteten Anfragen haben.</p> <p>Die von Ihnen an uns per Kontaktanfragen &uuml;bersandten Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihres Anliegens). Zwingende gesetzliche Bestimmungen &ndash; insbesondere gesetzliche Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
    <h2>4. Plugins und Tools</h2>
    <h3>Google Web Fonts</h3> <p>Diese Seite nutzt zur einheitlichen Darstellung von Schriftarten so genannte Web Fonts, die von Google bereitgestellt werden. Die Google Fonts sind lokal installiert. Eine Verbindung zu Servern von Google findet dabei nicht statt.</p>
    <p>Quelle: <a href="https://www.e-recht24.de">eRecht24</a></p>
</section>

<div id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 animate-box">
                <h3 class="section-title">YOURRADIOBOTS</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>

            </div>

            <div class="col-md-4 animate-box">
                <h3 class="section-title">Rechtliches</h3>
                <ul class="contact-info">
                    <li><a href="/impressum">Impressum</a></li>
                    <li><a href="/datenschutz">Datenschutz</a></li>
                    <li><a href="/agb">Allgemeine Geschäftsbedingungen</a></li>
                </ul>

            </div>
            <div class="col-md-4 animate-box">
                <h3 class="section-title">Soziale Medien</h3>
                <ul class="social-media">
                    <li><a href="https://yourradiobots.eu/go/instagram" class="facebook"><i class="icon-instagram"></i></a>
                    </li>
                    <li><a href="https://twitter.com/YourRadioBots" class="twitter"><i class="icon-twitter"></i></a>
                    </li>
                    <li><a href="https://yourradiobots.eu/go/youtube" class="dribbble"><i class="icon-youtube-play"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="copy-right">Copyright &copy; {{\Carbon\Carbon::now()->year}} YourMusicBot.eu Alle Rechte vorbehalten.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
<!-- Counters -->
<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>
<!-- Main JS (Do not remove) -->
<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>