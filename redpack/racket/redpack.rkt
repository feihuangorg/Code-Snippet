#lang racket

;; the factor which control max redpack
(define LUCK_FACTOR 2)

;; the core redpack algorithm
;; return a redpack with given money divided by n person
(define (luck-money money n)
  (if (> n 1)
      (luck-money (- money (my-random (exact-ceiling (* (/ money n) LUCK_FACTOR))))
                  (- n 1))
      (max 1 money)))

;; return num between 1 and k, include 1 and k
(define (my-random k)
  (if (> k 1)
      (+ 1 (random k))
      1))

;; test 
(define (redpack-test money n times)
  (printf "money:\t~a\n" money)
  (printf "person:\t~a\n" n)
  (define (test-iter money n)
    (when (> money 0)
      (let ([tm (luck-money money n)])
        (printf "\t~a" (/ tm 100.0))
        (test-iter (- money tm) (- n 1)))))
  (define (run-test total rt)
    (when (> rt 0)
      (printf "\t第~a次  " (+ 1 (- total rt)))
      (test-iter (* money 100) n)
      (printf "\n")
      (run-test total (- rt 1))))
  (run-test times times))


      