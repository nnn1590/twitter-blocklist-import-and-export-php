# twitter-blocklist-import-and-export-php
Import/export block list like Twitter Web Client

## Rate limit
Currently there is no particular consideration for rate limits...

## Q: Not blocked as "Imported"
A: Because it is a specification.

## Q: So slow!
It could be due to sending the request even if it's already blocked from the list...
Possible ways to speed up: Diff the block list and only send the request if it is unblocked.

## License
Copyright 2020 NNN1590 | GNU General Public License v3.0 or later(`GPL-3.0-or-later`)
