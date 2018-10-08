class FirebaseService{

FileInputStream serviceAccount =
  new FileInputStream("path/to/serviceAccountKey.json");

FirebaseOptions options = new FirebaseOptions.Builder()
  .setCredentials(GoogleCredentials.fromStream(serviceAccount))
  .setDatabaseUrl("https://test-line-api-e73a3.firebaseio.com")
  .build();

FirebaseApp.initializeApp(options);

}
