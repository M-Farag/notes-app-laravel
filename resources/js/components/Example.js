import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an example component!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
function formatMyName(a,b){
    return {
        firstName :a,
        lastName : b,
        fullName:function(){
            return  a + ' '+ b
                            }
            }
}
const myName = new formatMyName('munch','React')
const element = React.createElement(
    'h6',
    {className:'small text-uppercase'},
    'React Update: '+ myName.fullName(),
    );
ReactDOM.render(element,document.getElementById('example'));
