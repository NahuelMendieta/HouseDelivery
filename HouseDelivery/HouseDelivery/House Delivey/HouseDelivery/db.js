const { MongoClient } = require('mongodb');
const uri = 'your_mongodb_connection_string';
const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

async function connectDB() {
  try {
    await client.connect();
    console.log('Connected to MongoDB');
    return client.db('house_delivery');
  } catch (error) {
    console.error(error);
  }
}

module.exports = connectDB;
