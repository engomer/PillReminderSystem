# PillReminderSystem
An IOT System for the patients which are forget to take pill
Base on ESP12-E Serial WiFi Module

Project Includes a PHP basit API system

Principle:

Admin manages the users from the admin panel which has the path /api/gm
User can manage the pills(add, delete)
User can add pill which must be taken multiple doses and times in a day (up to 4)

User-specific Module gets the pills from server and when the time has come, starts to beep and prints the dose and the name of pill on the lcd screen.

The Module:

![Module](/module.jfif)
