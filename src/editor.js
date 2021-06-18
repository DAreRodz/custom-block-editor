import {
  Popover,
  SlotFillProvider,
  DropZoneProvider,
} from "@wordpress/components";
import Notices from "./components/notices";
import Header from "./components/header";
import Sidebar from "./components/sidebar";
import BlockEditor from "./components/block-editor";

const Editor = ({ settings }) => {
  return (
    <SlotFillProvider>
      <DropZoneProvider>
        <div className="custom-block-editor-layout">
          <Notices />
          <Header />
          <Sidebar />
          <BlockEditor settings={settings} />
        </div>
        <Popover.Slot />
      </DropZoneProvider>
    </SlotFillProvider>
  );
};

export default Editor;
