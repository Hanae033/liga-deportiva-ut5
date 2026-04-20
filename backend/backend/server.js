const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');

const app = express();

// Permitir peticiones desde Angular
app.use(cors());

// Permitir recibir JSON
app.use(express.json());


// 🔹 CONEXIÓN A MONGODB (PEGA AQUÍ TU URL REAL)
mongoose.connect(
  "mongodb+srv://ligaUser:hanae2003@cluster0.re735e1.mongodb.net/LigaDeportiva?appName=Cluster0"
)
.then(() => console.log('MongoDB conectado correctamente'))
.catch(err => console.error('Error al conectar MongoDB:', err));


// 🔹 ESQUEMA DE USUARIO
const userSchema = new mongoose.Schema({
  username: String,
  password: String,
  tipo: String
});

// 🔹 MODELO
const User = mongoose.model('User', userSchema);


// 🔹 REGISTRO DE USUARIO
app.post('/api/users/register', async (req, res) => {
  try {
    const { username, password, tipo } = req.body;
    const newUser = new User({ username, password, tipo });
    await newUser.save();
    res.json(newUser);
  } catch (error) {
    res.status(500).json({ error: 'Error al registrar usuario' });
  }
});


// 🔹 LOGIN DE USUARIO
app.post('/api/users/login', async (req, res) => {
  try {
    const { username, password } = req.body;
    const user = await User.findOne({ username, password });
    if(user) res.json(user);
    else res.status(400).json({ message: 'Usuario o contraseña incorrectos' });
  } catch (error) {
    res.status(500).json({ error: 'Error en el login' });
  }
});


// 🔹 PUERTO DEL SERVIDOR
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor funcionando en http://localhost:${PORT}`);
});
