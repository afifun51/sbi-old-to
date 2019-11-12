
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>Tryout CBT</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<link rel="stylesheet" href="css/login_style.css" type="text/css" title = "bright" media="screen" />
<link rel="stylesheet 2" href="css/login_reset.css" type="text/css" title = "dark" media="screen" />
<link rel="stylesheet" href="css/mystyle.css" type="text/css" title = "bright" media="screen" />
<link rel="stylesheet 2" href="css/mystyle2.css" type="text/css" title = "dark" media="screen" />

<link rel="icon" href="images/favicon.ico" />
<link rel="shortcut icon" href="images/favicon.ico" />

<script	type ="text/javascript">
window.onerror = handleError;

function handleError(errType, errURL, errLine) {
	window.status = "Error: " + errType + " on line " + 
			errLineNum ;
	return true;
}


function set_cookie ( cookie_name, cookie_value,
		lifespan_in_days, valid_domain ) {
    var domain_string = valid_domain ?
                       ("; domain=" + valid_domain) : '' ;
    document.cookie = cookie_name +
                       "=" + encodeURIComponent( cookie_value ) +
                       "; max-age=" + 60 * 60 *
                       24 * lifespan_in_days +
                       "; path=/" + domain_string ;
}

function get_cookie ( cookie_name ) {
    var cookie_string = document.cookie ;
    if (cookie_string.length != 0) {
        var cookie_value = cookie_string.match (
                        '(^|;)[\s]*' +
                        cookie_name +
                        '=([^;]*)' );
        return decodeURIComponent ( cookie_value[2] ) ;
    }
    return '' ;
}

function switch_style ( css_title )
{
  var i, link_tag ;
  for (i = 0, link_tag = document.getElementsByTagName("link") ;
    i < link_tag.length ; i++ ) {
    if ((link_tag[i].rel.indexOf( "stylesheet" ) != -1) &&
      link_tag[i].title) {
      link_tag[i].disabled = true ;
      if (link_tag[i].title == css_title) {
        link_tag[i].disabled = false ;
      } 
	   set_cookie( "page-theme", css_title, 2);
	}
  }
}

function set_style_from_cookie()
{
  var css_title = get_cookie("page-theme");
  if (css_title.length) {
    switch_style( css_title );
  }
}
</script>
</head>
