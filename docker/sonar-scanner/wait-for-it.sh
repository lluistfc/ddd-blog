#!/bin/bash
# wait-for-postgres.sh

set -e

host="$1"
shift
cmd="$@"

until curl -i $host ; do
  >&2 echo "Sonarqube server is unavailable - sleeping"
  sleep 1
done

>&2 echo "Sonarqube server is up - executing command"
exec $cmd