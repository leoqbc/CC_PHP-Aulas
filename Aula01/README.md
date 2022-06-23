# Pasta de teste de performance

## Usamos a ferramente Apache Benchmark(ab)
Comando para teste usado:

```bash
ab -n 1000 -c 10 localhost:8881/ > php74_sem_opcache.txt 
ab -n 1000 -c 10 localhost:8881/ > php74_com_opcache.txt
```

-n numero de requisições total
-c numero de concorrencias, quivale n/c (total requisições / concorrência simultenea)

### Resultado sem OPcache desativado, PHP 7.2:
```yml
Concurrency Level:      10
Time taken for tests:   9.929 seconds
Complete requests:      1000
Failed requests:        0
Total transferred:      3532938 bytes
HTML transferred:       2445000 bytes
Requests per second:    100.71 [#/sec] (mean)
Time per request:       99.291 [ms] (mean)
Time per request:       9.929 [ms] (mean, across all concurrent requests)
Transfer rate:          347.48 [Kbytes/sec] received
```

### Resultado com OPcache ativado, PHP 7.2:
```yml
Concurrency Level:      10
Time taken for tests:   1.707 seconds
Complete requests:      1000
Failed requests:        0
Total transferred:      3532878 bytes
HTML transferred:       2445000 bytes
Requests per second:    585.78 [#/sec] (mean)
Time per request:       17.071 [ms] (mean)
Time per request:       1.707 [ms] (mean, across all concurrent requests)
Transfer rate:          2020.97 [Kbytes/sec] received
```

### Resultado com OPcache ativado, PHP 7.4:
```yml
Concurrency Level:      10
Time taken for tests:   1.072 seconds
Complete requests:      1000
Failed requests:        0
Total transferred:      3533156 bytes
HTML transferred:       2445000 bytes
Requests per second:    932.87 [#/sec] (mean)
Time per request:       10.720 [ms] (mean)
Time per request:       1.072 [ms] (mean, across all concurrent requests)
Transfer rate:          3218.71 [Kbytes/sec] received
```