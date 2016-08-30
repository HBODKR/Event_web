function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#table').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'inscri.csv');
        }
    } else {
        $('#click').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#click').attr('download', 'inscri.csv');
    }

}

/*if(isset($_POST['submit']))
{
$host ="localhost";  
$user ="root";
$bd = "elspace";
$password  ="";
$c=mysqli_connect($host,$user,$password) or die("erreur connexion !!");
mysqli_select_db($c,$bd) or die("erreur au base de donne !!");
$file= '/particpants/'.strtotime("now").'.csv';   
$fp=fopen($file,"w"); 
$rq=mysqli_query("select * from paritcpant");

  
    mysqli_data_seek($rq,0);
    while($row=mysqli_fetch_assoc($rq))
    {
    $seperator="";
    $comma="";
    foreach($row as $name => $value)
    {
        $seperator .=  $comma . '' .str_repalce('','""',$value);
        $comma=",";
            
    }
    $sperator .= "\n";
    }
    fputs($fp,$seperator);
fclose($fp);
}*/