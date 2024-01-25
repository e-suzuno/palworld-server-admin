#!/bin/bash
# CPU usage
CPU_P=$(top -bn1 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk '{print 100 - $1"%"}')

# Memory usage
MEM_P=$(free -m | awk 'NR==2{printf "%.2f%%", $3*100/$2 }')

echo -e "$CPU_P\n$MEM_P"
