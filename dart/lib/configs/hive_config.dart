

import 'dart:io';

import 'package:flutter/material.dart';
import 'package:hive_flutter/hive_flutter.dart';
import 'package:path_provider/path_provider.dart';


class HiveConfig {
  static start() async {
    WidgetsFlutterBinding.ensureInitialized();
    Directory appDocDirectory = await getApplicationDocumentsDirectory();
    await Hive.initFlutter(appDocDirectory.path);
  }
}