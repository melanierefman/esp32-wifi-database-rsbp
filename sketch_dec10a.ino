#include <WiFi.h> 
#include <HTTPClient.h> 

String URL = "http://192.168.144.63/esp32/database.php";

const char* ssid = "Melanie's Galaxy A52"; 
const char* password = "a12345678";

void setup() {
  Serial.begin(9600); 
  connectWiFi();
}

void loop() {
  if(WiFi.status() != WL_CONNECTED) { 
    connectWiFi();
  }

  int data1 = random(35, 37); 
  int data2 = random(150, 180);
  int data3 = random(120, 130);
  int data4 = random(60, 100);
  int data5 = random(40, 70);
  int data6 = random(0, 200);
  int data7 = random(170, 250);

  String postData = "data1=" + String(data1) +
                    "&data2=" + String(data2) +
                    "&data3=" + String(data3) +
                    "&data4=" + String(data4) +
                    "&data5=" + String(data5) +
                    "&data6=" + String(data6) + 
                    "&data7=" + String(data7);

  HTTPClient http; 
  http.begin(URL);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  
  int httpCode = http.POST(postData); 
  String payload = http.getString(); 
  
  Serial.print("URL : "); Serial.println(URL); 
  Serial.print("Data: "); Serial.println(postData); 
  Serial.print("httpCode: "); Serial.println(httpCode); 
  Serial.print("payload : "); Serial.println(payload); 
  Serial.println("--------------------------------------------------");

  delay(5000); // Delay untuk memberikan waktu sebelum koneksi berikutnya
}

void connectWiFi() {
  WiFi.mode(WIFI_OFF);
  delay(10000);
  //This line hides the viewing of ESP as wifi hotspot
  WiFi.mode(WIFI_STA);
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
    
  Serial.print("connected to : "); Serial.println(ssid);
  Serial.print("IP address: "); Serial.println(WiFi.localIP());
} 