

import 'dart:io';

import 'package:flutter/material.dart';
import 'package:hive_flutter/hive_flutter.dart';
import 'package:path_provider/path_provider.dart';


class HiveConfig {
  static start() async {
    WidgetsFlutterBinding.ensureInitialized();
    Directory appDocDirectory = await getApplicationDocumentsDirectory();

    Directory(appDocDirectory.path+'/'+'dir').create(recursive: true)
        .then((Directory directory) {
      print('Path of New Dir: '+directory.path);
    });
    await Hive.initFlutter(appDocDirectory.path);
  }
}