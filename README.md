Install redis :

sudo apt-get update
sudo apt-get install redis-server

Configuration queue env :

QUEUE_CONNECTION=redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_PASSWORD=null
QUEUE_PREFIX=laravel
QUEUE_DRIVER=redis
QUEUE_REDIS_QUEUE=default
QUEUE_REDIS_CONNECTION=cache
QUEUE_REDIS_RETRY_AFTER=90

'max_concurrent_jobs' => 10 : số lượng tác vụ đồng thời thực hiện
'timeout' => 60 : thời gian thực hiện tối đa của mỗi queue 
'sleep_seconds' => 5 : thời gian chờ giữa các lần đến thăm hàng đợi
'retry_after' : số giây mà một tác vụ sẽ bị đưa vào lại hàng đợi nếu nó thất bại trong lần thực hiện đầu tiên. 
'block_for' : xác định thời gian tối đa mà một tác vụ có thể bị chặn (block) trong hàng đợi trước khi được xem là thất bại.
