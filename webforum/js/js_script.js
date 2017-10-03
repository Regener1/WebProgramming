/**
 * Created by Regener on 03.10.2017.
 */
function down()
{
    var a = document.getElementsByClassName('.dropdown-content');
    if ( a.style.display == 'none' )
        a.style.display = 'block'
    else
    if ( a.style.display == 'block' )
        a.style.display = 'none';
};