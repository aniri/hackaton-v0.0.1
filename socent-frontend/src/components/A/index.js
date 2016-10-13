import React, { PropTypes } from 'react';



function A({ ...props }) {
  const { className, children, href, target } = props;
  return (
    <a
      href={href}
      target={target}
      className={className}
    >
      { children }
    </a>
  );
}

A.propTypes = {
  className: PropTypes.string,
  href: PropTypes.string.isRequired,
  target: PropTypes.string,
  children: PropTypes.node.isRequired,
};

export default A;
