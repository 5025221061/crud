import logo from './logo.svg';
import React from 'react';
import ReactDOM from 'react-dom';
import './App.css';

const element = React.createElement(
  'h1',
  {className: 'greeting'},
  'Hello, world!'
);

const kasur = ReactDOM.createRoot(document.getElementById('kasur'));

function tick(){
  const element = (
    <div>
      <h1>Hello, world!</h1>
      <h2>It is {new Date().toLocaleTimeString()}.</h2>
    </div>
  );
  kasur.render(element);
}

setInterval(tick, 1000);

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
         Edit ini di app.js dan simpan untuk reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
