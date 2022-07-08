$_SESSION["nome"] = "SENAC";
session_unset($_SESSION['nome']);
echo session_id();
session_id('ofkncku49jq860tn0et5utgnkl');
session_start();
session_regenerate_id();
echo session_id();
var_dump($_SESSION);
echo session_save_path();
echo "<br>";
var_dump(session_status());
echo "<br>";
switch(session_status()) {
    case PHP_SESSION_DISABLED:
    echo "Sessões desabilitadas";
    break;
    case PHP_SESSION_NONE:
    echo "Sessões habilitadas, mas não existem";
    break;
    case PHP_SESSION_ACTIVE:
    echo "Sessões habilitadas e existem";
    break;
}

