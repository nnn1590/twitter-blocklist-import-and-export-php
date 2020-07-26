# twitter-following-followers-blocking-list-import-and-export-php
Import/export following/followers/blocking list like Twitter Web Client

WARNING: This app/tool does not specifically consider Twitter API rate limits or account lock/suspend.
Please be careful when using...
<br>
警告: このアプリ/ツールはTwitter APIのレートリミットやアカウントのロック/凍結について特に考慮していません。
使用する場合は気をつけてください…

## FAQ
### Q: Not blocked as "Imported"
A: Because it is a specification.

### Q: Importing is so slow!
A: It could be due to sending the request even if it's already followed/blocked/muted from the list...
   Possible ways to speed up: Diff the follow/block list and only send the request if it is unfollowed/unblocked.
   UPDATE(20/07/26): Added mode2. Please try it.
                     This is done by taking the difference between the user who is already followed/blocked/muted and the uploaded list.
                     It consumes more API rate to get users who have already followed/blocked/muted, but is maybe faster because fewer requests.

## License
Copyright 2020 NNN1590 | GNU General Public License v3.0 or later(`GPL-3.0-or-later`)
