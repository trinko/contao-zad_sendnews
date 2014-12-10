ZAD Send News - An extension for Contao CMS
------------------------------------------------
This utility allows you to post news sent by email.

You can set:
* the mail server from which to read emails (POP3/IMAP);
* the news archive where to post contents;
* the author for posted news;
* whether to include file attachments (and where files are saved);
* how to add the attached images to the news (whether to show images inline or using Contao Image Gallery);
* how often to check for new emails;
* automatic publication of news (immediate, delayed, suspended);
* the action to take on emails after posting the news (delete, log to file,
  move to another folder of the mailbox).

You can also add filters on news fields, using the a regular expression or
predefined actions.

Besides, you can do an automatic conversion of file attachments to PDF
documents, specifying which types of files to convert.
To use this feature, the system requirements are:
* OpenOffice (version >= 3.x) or LibreOffice installed and running as a
  service on port 2002;
* Python installed with the Python-UNO-bridge extension.
