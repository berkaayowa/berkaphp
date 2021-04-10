# Book of More Money Website

[![pipeline status](https://gitlab.com/bofmm/website/badges/master/pipeline.svg)](https://gitlab.com/bofmm/website/commits/master)

## Local Installation

[TODO]

## Backing up non-code assets

Non-code related backups are currently handled via `cron` jobs on GoDaddy.
Specifically, we backup the photos that were uploaded via the admin panel and
the database. These jobs are currently run daily, with an archive of 3 weeks.

To backup the database:

```
$ mysqldump bofmm > /home/chp6d4txtjxx/backups/$(date +\%F)_bofmm.sql
```

where the username and password are provided via `~./my.cnf`.

```
[mysqldump]
user=username
password=secret
```

To backup the images:

```
$ zip -r /home/chp6d4txtjxx/backups/$(date +\%F)_pics.zip /home/chp6d4txtjxx/www/Views/Default/Assets/Save
```

To backup the error logs:

```
$ mv /home/chp6d4txtjxx/www/error_log /home/chp6d4txtjxx/backups/$(date +\%F)_errors.log
```

To remove old files:

```
$ find /home/chp6d4txtjxx/backups -type f -mtime +21 -exec rm {} +
```
