'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
    this.value = 0;
  }

  render() {
    if (this.state.liked) {
      this.value = this.value + 1;
      return e(
        'button',
        { onClick: () => this.setState({ liked: false }) },
        'Liked'+this.value
      );
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'+this.value
    );
  }
}

const domContainer = document.querySelector('#like_button_container');
const root = ReactDOM.createRoot(domContainer);
root.render(e(LikeButton));