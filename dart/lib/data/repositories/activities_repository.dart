import 'package:chuva_dart/adapters/activities_hive_adapter.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/material.dart';
import 'package:hive/hive.dart';
import 'dart:collection';

class ActivitiesRepository extends ChangeNotifier {
  final List<Activities> _activities = [];
  final Map<int, bool> _favoritesMap = {};
  late LazyBox box;

  static final ActivitiesRepository _singleton = ActivitiesRepository._internal();

  factory ActivitiesRepository() {
    return _singleton;
  }

  ActivitiesRepository._internal() {
    _startRepository();
  }

  UnmodifiableListView<Activities> get activities => UnmodifiableListView(_activities);
  UnmodifiableListView<Activities> get favorites => UnmodifiableListView(_activities.where((activity) => _favoritesMap[activity.id] ?? false).toList());

  _startRepository() async {
    if (!Hive.isBoxOpen('Activities')) {
      await _openBoxActivities();
    }
    await _readActivities();
  }

  _openBoxActivities() async {
    Hive.registerAdapter(ActivitiesHiveAdapter());
    box = await Hive.openLazyBox<Activities>('Activities');
  }

  _readActivities() async {
    final keys = box.keys.toList();
    for (var key in keys) {
      Activities act = await box.get(key);
      _activities.add(act);
      _favoritesMap[act.id] = act.favorite!;
      notifyListeners();
    }
  }

  saveAll(List<Activities> activities) {
    activities.forEach((activity) async {
      if (!_activities.any((atual) => atual.id == activity.id)) {
        _activities.add(activity);
        _favoritesMap[activity.id] = activity.favorite!;
        await box.put(activity.id, activity);
      }
    });
    notifyListeners();
  }

  bool isEmpty(){
    return _activities.isEmpty;
  }

  toggleFavorite(int id) async {
    bool isCurrentlyFavorite = _favoritesMap[id] ?? false;
    _favoritesMap[id] = !isCurrentlyFavorite;
    var activity = await box.get(id) as Activities;
    activity.favorite = _favoritesMap[id];
    await box.put(id, activity);
    notifyListeners();
  }
}
