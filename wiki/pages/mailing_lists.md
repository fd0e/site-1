---
author: ~erxeto
published: true
title: mailing lists
description: tildeverse mailing lists netiquette
category:
    - main
----

# mailing lists netiquette

The tildeverse has now its own mailing list service. You can take a look at:

    [lists.tildeverse.org]https://lists.tildeverse.org/

This is a description of the basic *netiquette* rules for this service. Most of
the text is taken shamelessly from https://man.sr.ht/lists.sr.ht/etiquette.md
with some adaptations and a couple more suggestions taken from other lists out
there.

Some email clients have popularized email usage patterns which are considered
poor form on many mailing lists. Please review some of our suggestions for
participating more smoothly in discussions on the tildeverse.  This advice will
likely serve you well outside of the tildeverse as well.

If you have any troubles following this guides or don't know how to configure
your email client for this purpose, ask on IRC (#meta or #team), you'll find
always somebody willing to help.

## Plain text

Please make sure that your email client is configured to use plain text emails.
By default, many email clients compose emails with HTML, so you can use rich
text formatting. Rich text is not desirable for mailing lists. Keep in mind that
some people uses console email clients without html rendering support. Also,
people with high volume of emails may pre-process them and html is not good for
that. So you should disable this feature and send your email as "plain text".
Every email client is different, you should research the options for your
specific client.

## Top-posting

Some email clients will paste the entire email you're replying to into your
response and encourage you to write your message over it. This behavior is
called "top posting" and is discouraged on the tildeverse lists (or on any
mailing list really). Instead, cut out any parts of the reply that you're not
directly responding to and write your comments inline.  Feel free to edit the
original message as much as you like. In other words, keep the relevant context
for your reply and delete the rest. This makes cleaner emails that are easier to
read, even if the reader jumps in the middle of a thread.

For example, if I emailed you:

    Hey Casey,

    Can you look into the bug which is causing 2.34 clients to disconnect
    immediately? I think this is related to the timeouts change last week.

    Also, your fix to the queueing bug is confirmed for the next release,
    thanks!

You might respond with:

    Hey Drew, I can look into that for sure.

    > I think this is related to the timeouts change last week.

    I'm not so sure. I think reducing the timeouts would *improve* this issue,
    if anything.

    > Also, your fix to the queueing bug is confirmed for the next release,
    > thanks!

    Sweet! Happy to help.

- A: Because it reverses the logical flow of conversation.
- Q: Why is top posting frowned upon?

## Wrap lines

Please wrap lines in your email at 72 columns. Many people use email readers
designed to faithfully display plain text and won't break lines at a width which
is comfortable for reading, or won't break lines at all, which is useful when
reviewing patches.  Some readers also have many things open in addition to their
mail client, and may not allocate as much screen real-estate to email as you do.

If you're curious about why this arbitrary column count. "Regular" terminals
have 80 columns, and 8 characters less gives you some room for the response
prefix ('> ') making threads with nested replies more readable.

Don't worry about re-wrapping lines written by anyone you're quoting unless you
want to.

## PGP Signatures

If you use PGP, please attach your signature to the message instead of using an
inline signature. Look in your local PGP implementation's documentation for
`PGP/MIME` options.

## Attachments

Try not to send attachment to the list or, if you do it, make sure they are
small files. Think about people with bad internet connection or limited
resources.  It's better to send a link to download whatever you want to share.
If you send links, it's a good practice to describe the content and the size,
so the reader can choose to download it or not before following the link. For
example, you can upload a file to [ttm.sh](https://ttm.sh) or drop it in your
`~/public_html` directory and then send the link to the list like so:

    https://ttm.sh/mydocument.pdf (pdf, 3,5MB)

# Conclusion

Whatever you send to a mailing list gets forwarded to an unknown number of email
accounts. You cannot know beforehand the quality of connection, resources,
operating systems or really anything else the people that owns those accounts
have. So, try to stick to the principles here stated to make the whole list
communication easier for all.

Thank you for taking the time to adjust your habits!
