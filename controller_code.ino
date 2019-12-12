#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>
#include <LiquidCrystal_I2C.h>
#define BUZZERPIN 2
const char* ssid = "ahmet";
const char* password = "123456789";
LiquidCrystal_I2C lcd(0x27, 16, 2);
const char* host = "hastatakipsistemi.herokuapp.com";

String globpill;
String globdose;
String globtime;
const int httpsPort = 80;
String line = "";
int buzzflag= 0;
void connectWiFi();
void getResponse();
void parseJSON();
void print2screen(String pill, String dose, String Time);
void buzerror();
void setup(){
Serial.begin(115200);
Serial.println();
pinMode(2, OUTPUT);
connectWiFi();
lcd.init();
  lcd.backlight();
  lcd.setCursor(0,1);
  lcd.print("Merhaba");
  delay(4000);
  print2screen("Hazirlaniyor..","","","");
}
void loop(){

  getResponse();
  parseJSON();
  Serial.println(globdose);
  if(globpill.equals("0"))
  {
    print2screen("Hasta Takip", "Sistemi", "", "");
    buzzflag = 0;
    
  }
  else
  {
    print2screen(globpill,"Doz: ", globdose,globtime);
    if(buzzflag==0)
    {
      buzzflag=1;
      buzerror();
    }
  }
  delay(2000);
}

void getResponse()
{
  Serial.print("connecting to ");
  Serial.println(host);
 
  WiFiClient client;
  
  if (!client.connect(host, 80)) { Serial.println("connection failed"); return;}
  
  
  String url = "/api/get.php?user=ahmet&pwd=yalim";
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  client.print("GET " + url + " HTTP/1.0\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  delay(500);
 
  while(client.available()){
     line = client.readStringUntil('\r');
    Serial.println(line);
 }

 Serial.println();
  Serial.println("closing connection");
  delay(500);
}
void buzerror() //BUZZER BEEP FUNCTION
{
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
    delay(200);
    digitalWrite(BUZZERPIN, HIGH);
    delay(200);
    digitalWrite(BUZZERPIN, LOW);
}

void parseJSON()
{
  Serial.print("Parsing...");
 // Serial.println(line);
 
  StaticJsonBuffer<300> JSONBuffer; //Memory pool
  JsonObject& parsed = JSONBuffer.parseObject(line);   //Parse message
 
  if (!parsed.success()) {      //Check for errors in parsing
 
    Serial.println("Parsing failed");
    delay(5000);
    return;
 
  }
 
  String pill = parsed["pillname"]; 
 // Serial.print("Pill Name: ");
 // Serial.println(pill);
  globpill = pill;
  String dose = parsed["dose"]; 
 // Serial.print("\nDose: ");
 // Serial.println(dose);
  globdose = dose;
  String timee = parsed["time"]; 
 // Serial.print("\nTime: ");
 // Serial.println(timee);
  globtime = timee;
  Serial.println("Parsing Complete");
  delay(1000);
 
}

void connectWiFi()
{
  Serial.print("connecting to ");
Serial.println(ssid);
WiFi.begin(ssid, password);
while(WiFi.status() != WL_CONNECTED) {
delay(500);
Serial.print(".");
}
Serial.println("");
Serial.println("WiFi connected");
Serial.println("IP address: ");
Serial.println(WiFi.localIP());
}

void print2screen(String pill,String namee, String dose, String Time) // PRINTS THE MEASUREMENT VALUES TO THE LCD SCREEN
{
  lcd.clear();
  lcd.home();
  
  lcd.print(pill);
  lcd.setCursor(0,1);
  lcd.print(namee);
  lcd.print(dose);
  lcd.print(" ");
  lcd.print(Time);
 }
