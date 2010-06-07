#!/bin/bash
# convertor.sh
# resize images
convert $1 -resize 100x80 bgsmall/$1
convert $1 -resize 1024x800 bgs/$1
