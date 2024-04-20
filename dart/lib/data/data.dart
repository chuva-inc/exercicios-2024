import 'package:path/path.dart';
import 'package:sqflite/sqflite.dart';

class DatabaseHelper {
  static Database? _database;

  Future<Database> get database async {
    if (_database != null) return _database!;
    _database = await initDatabase();
    return _database!;
  }

  Future<Database> initDatabase() async {
    return await openDatabase(
      join(await getDatabasesPath(), 'favorites_database.db'),
      onCreate: (db, version) {
        return db.execute(
          'CREATE TABLE favorites(id INTEGER PRIMARY KEY)',
        );
      },
      version: 1,
    );
  }

  Future<void> insertFavorite(int id) async {
    final Database db = await database;
    await db.insert(
      'favorites',
      {'id': id},
      conflictAlgorithm: ConflictAlgorithm.replace,
    );
  }

  Future<List<int>> getFavorites() async {
    final Database db = await database;
    final List<Map<String, dynamic>> maps = await db.query('favorites');
    return List.generate(maps.length, (i) {
      return maps[i]['id'];
    });
  }

  Future<void> deleteFavorite(int id) async {
    final Database db = await database;
    await db.delete(
      'favorites',
      where: 'id = ?',
      whereArgs: [id],
    );
  }

  Future<void> clearFavorites() async {
    final Database db = await database;
    await db.delete('favorites');
  }
}
