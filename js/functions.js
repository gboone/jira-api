jQuery( 'body' ).ready(function($) {

    var anchor = $('a.jira')
    var id = $(anchor).attr("id");
    var issue = id.substring(5);
    var movement = $(anchor).attr('css');
    var message = anchor.text();
    $(anchor).prepend(issue + ': ');
    if ( movement.substr('-5', 10 ) != 'Sent' ) {
        do_jira(anchor, issue, movement, message);
    }
})

function do_jira(anchor, issue, movement, message) {
    return true;
}
