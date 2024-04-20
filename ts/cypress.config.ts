import { defineConfig } from "cypress";
const getCompareSnapshotsPlugin = require('cypress-visual-regression/dist/plugin');

export default defineConfig({
  env: {
    screenshotsFolder: './cypress/snapshots/actual',
    trashAssetsBeforeRuns: true,
    video: true,
    failSilently: false,
  },
  retries: {
    runMode: 0,
    openMode: 0,
  },
  viewportWidth: 1280,
  viewportHeight: 800,
  e2e: {
    setupNodeEvents(on, config) {
      getCompareSnapshotsPlugin(on, config);
    },
  },
});
