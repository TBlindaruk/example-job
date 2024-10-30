### First

Queues background job via Redis, to download and insert/upsert data in specified number of seconds:
curl -s -X PUT 'http://127.0.0.1:8081/data' \
-H 'Content-Type: application/json' \
-d '{"delaySeconds": 123}'

{"data": {"success": true}}