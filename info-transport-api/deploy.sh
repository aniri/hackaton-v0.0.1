#!/usr/bin/env bash

set -xe

DRY_RUN= # --dry-run
rsync $DRY_RUN --exclude-from=rsync.ignore -avrh . govithub:/root/work/public_transport_api
