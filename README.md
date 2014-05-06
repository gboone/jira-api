# JIRA-API

## A Simple plugin for integrating a JIRA instance into a WordPress blog

This plugin hooks (or will hook) into posts and comments to look for a shortcode
`[jira]` surrounding a block of text like this `[/jira]` and will take certain
parameters to move or comment on issues in your board. It will use the text inside
the tags as the comment text, for an issue specified as a parameter.

Example:

```
[jira issue='DP-999']This is a comment.[/jira]
```

This will add the text "This is a comment." to issue DP-999.

To close an issue just add the `update` parameter with the "transition" you want to
apply. Possible transitions are dependent on your JIRA instance but an example might
be `[jira issue='DP-999' update='fixed']`. The shortcode doesn't have any display
properties unlike the normal usecase, rather it simply sends or gets data from the
API.

This plugin is a work in progress, as of now it does not do anything but contain some
methods for interfacing with Jira.

### Installation

Get started by cloning this repo into your plugins directory. Then add three
environment variables to your web server: 'JIRA_DOMAIN,' 'JIRA_PASS,' and
'JIRA_USER.' Once your environment variables are set, activate the plugin. This last
step will make the shortcode available.

### Uninstallation

This plugin makes no changes to your database, so you don't need to worry about it
leaving a mess behind.

