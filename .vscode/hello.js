'use strict';


class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
    this.value = 0;
  }

  render() {
    return (<button>hello</button>);
  }
}

const domContainer = document.querySelector('#like_button_container');
const root = ReactDOM.createRoot(domContainer);
root.render(LikeButton);