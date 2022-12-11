//DHT11 esp8266 compatilibity librery for air humidity and temperature sensor
#include "DHTesp.h"
//Adafruit clone library for liminocity sensor
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_TSL2561_U.h>
//library for wifi conection and http post request
#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif
//Libraries for callmebot, a service that will recieve a request can send a whatsapp message
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <UrlEncode.h>

////////////////////////////////////////////////////////////////////////////////
//This Callmebotclass will hold the credentials for a URLencode to send trigger to callmebot

class callMeBot{
private:
//wifi name
  const char* ssid = "XD";
  //wifipassword
  const char* password = "4marceline";
  //phonenumber
  String phoneNumber = "+17872395035";
  //apikey permision for sending mesages to that number
  String apiKey = "7927940";
public:
//conmstructor
  callMeBot();
  void sendMessage(String message);
  void connect();
};


callMeBot::callMeBot(){
  
  }
  //sends mesage to callmebot after use of the .connect() method
void callMeBot::sendMessage(String message){
   // Data to send with http POST
  String url = "http://api.callmebot.com/whatsapp.php?phone=" + phoneNumber + "&apikey=" + apiKey + "&text=" + urlEncode(message);
  WiFiClient client;    
  HTTPClient http;
  http.begin(client, url);

  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  
  // Send HTTP POST request
  int httpResponseCode = http.POST(url);
  if (httpResponseCode == 200){
    Serial.print("Message sent successfully");
  }
  else{
    Serial.println("Error sending the message");
    Serial.print("HTTP response code: ");
    Serial.println(httpResponseCode);
  }

  http.end();
  }
//makes cobnection to internet
  void callMeBot::connect(){
 
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
    }
////////////////////////////////////////////////////////////////////////////////
// This class connects to the internet to send a POST to Seed esppost.php to input data into the database
class connection{
  private:

 //wifi information
    const char* ssid     = "XD";
    const char* password = "4marceline";
    const char* serverName = "http://192.168.1.34/seed/microrequest/postdata.php";
    //unique key for security
    const String apiKeyValue = "draz1rahc";
    //name of device
    String deviceKey;

  public:

    connection();
    void connect();
    void setKey(String Key);
    void sendData(String soilhumid, String humid, String tem, String lux);
  };
connection::connection(){
  
  }
  //executes conection
void connection::connect(){
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Succesfully connected to WiFi network : ");
  Serial.println(WiFi.localIP());
  }
void connection::setKey(String key){
  this->deviceKey=key;
  }
  //sends data that takes in input to the esppost.php
void connection::sendData(String soilhumid, String humid, String tem, String lux){
  if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    
    http.begin(client, serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your http POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&devicekey=" + String(deviceKey)
                          + "&soilhumidity=" + String(soilhumid) + "&humidity=" + String(humid)
                          + "&temperature=" + String(tem) + "&lux=" + String(lux) + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    int httpResponseCode = http.POST(httpRequestData);
            
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }

    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(30000);  
  }

/////////////////////////////////////////////////////////////////////////////////////////
//This class makes an object that manages the light sensor measured in Lux
class luxSensor{
  private:
    byte lux;
    Adafruit_TSL2561_Unified tsl = Adafruit_TSL2561_Unified(TSL2561_ADDR_FLOAT, 12345);
    void refresh();

  public:
    luxSensor();
    byte getLux();
    void printLux();

}; 

 luxSensor::luxSensor(){
    tsl.enableAutoRange(true);
    tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_13MS); 
    tsl.begin();
    refresh();
    }
    //refreshes value for functions
  void luxSensor::refresh(){
    sensors_event_t event;
    tsl.getEvent(&event);
    this->lux = event.light;
    }
    //returns lux value
  byte luxSensor::getLux(){
    refresh();
    return lux;
    }
    //prints luc vlaue to serial
  void luxSensor::printLux(){
    refresh();
    Serial.print(lux); Serial.println(" lux");
    }
  
//////////////////////////////////////////////////////
//this class makes an object to manage the air temperature and humidity sensors
class temHumiditySensor{
  private:
  //compatibility library workaround due to DTH11 sensor library does not work with AVR micro architecture fro esp8266
    DHTesp dht;
    short humidity;
    short temperature;
    void refresh();
  public:
    temHumiditySensor(byte pin);
    short getTemperature();
    short getHumidity();
    void printTemHumidity();
  };

  temHumiditySensor::temHumiditySensor(byte pin){
    dht.setup(pin, DHTesp::DHT11);
    refresh();
    }
    //refreshes values for functions
  void temHumiditySensor::refresh(){
    this->humidity = dht.getHumidity();
    this->temperature= dht.getTemperature();    
    }
    //returns temeprature
  short temHumiditySensor::getTemperature(){
    refresh();
    return temperature;
    }
    //returns air humidity in percentage
  short temHumiditySensor::getHumidity(){
    refresh();
    return humidity;
    }
    //prints values to serial
  void temHumiditySensor::printTemHumidity(){
    refresh();
    Serial.print("Status: ");
    Serial.print(dht.getStatusString());
    Serial.print("\t");
    Serial.print("Humidity (%): ");
    Serial.print(humidity, 1);
    Serial.print("\t");
    Serial.print("Temperature (C): ");
    Serial.print(temperature, 1);
    Serial.print("\t");
    Serial.println();
    }
///////////////////////////////////////////////////////////
//This class creates an object to mage soil humidity sensor
//this sensor shows wet to dry from an interval of 300 to 710 where 300 is wet and 710 is dry

class soilHumiditySensor{
  private:
    short humidity;
    void refresh();
  public:
        soilHumiditySensor();
        short getSoilHumidity();
        void printSoilHumidity();
        
  };
  soilHumiditySensor::soilHumiditySensor(){
    refresh();
    }
    //prints humidity to serial
  void soilHumiditySensor::printSoilHumidity(){
    refresh();
    if(isnan(this->humidity)){
    Serial.println("Fail to read");
    }
    else{
    Serial.println("Humidity: " + String(humidity));
      }
    }
    //returns soil humidity
  short soilHumiditySensor::getSoilHumidity(){
    refresh();
    return this->humidity;
    }
    //refreshes values for functions
  void soilHumiditySensor::refresh(){
    this-> humidity = analogRead(A0);
    }
//----------------------------
//Object instances initialized


soilHumiditySensor SHS;
luxSensor light;
temHumiditySensor TMS(14);
connection conn;
callMeBot whatssap;
 

void setup() {
  // Serial is set
  Serial.begin(9600);

}

void loop() {
//mesage that will be sent to Whatssap
  String message = "Your primer Prototipo plant needs Water! ";
  //set Device name
  conn.setKey("esp");
  //print values to serial
  SHS.printSoilHumidity();
  light.printLux();
  TMS.printTemHumidity();
  //makes conection
  conn.connect();
  //send data with conection to be inserted into database
  conn.sendData(String(SHS.getSoilHumidity()),String(TMS.getHumidity()),String(TMS.getTemperature()),String(light.getLux()));

  //If the soil is too dry, dry being set at 680 it will conect and send a message to whatsapp
  if(SHS.getSoilHumidity() > 680){
  whatssap.connect();
  whatssap.sendMessage(message);
  }
  delay(5000);
}
