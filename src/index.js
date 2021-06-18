import domReady from "@wordpress/dom-ready";
import { render } from "@wordpress/element";
import { registerCoreBlocks } from "@wordpress/block-library";
import Editor from "./editor";
import "./index.css";

domReady(() => {
  const settings = {};
  registerCoreBlocks();
  render(
    <Editor settings={settings} />,
    document.getElementById("custom-block-editor")
  );
});
