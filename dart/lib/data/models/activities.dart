import 'package:chuva_dart/data/models/category.dart';
import 'package:chuva_dart/data/models/description.dart';
import 'package:chuva_dart/data/models/location.dart';
import 'package:chuva_dart/data/models/role.dart';
import 'package:chuva_dart/data/models/title.dart';
import 'package:chuva_dart/data/models/type.dart';
import 'package:json_annotation/json_annotation.dart';
import 'package:chuva_dart/data/models/person.dart';

import 'bio.dart';

part 'activities.g.dart';

@JsonSerializable()
class Activities {
  final int id;
  @JsonKey(defaultValue: 0)
  final int? changed;
  @JsonKey(defaultValue: "")
  final String? name;
  @JsonKey(defaultValue: false)
  bool? favorite;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? start;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? end;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? institution;
  @JsonKey(fromJson: _bioFromJson)
  final Bio? bio;
  @JsonKey(fromJson: _titleFromJson)
  final Title? title;
  @JsonKey(fromJson: _descriptionFromJson)
  final Description? description;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? picture;
  final Category category;
  final List<Location> locations;
  final Type type;
  final List<dynamic> papers;
  final List<Person> people;
  final int status;
  final int weight;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? addons;
  @JsonKey(defaultValue: 0)
  final int? parent;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? event;

  Activities( {
    required this.favorite,
    required this.name,
    required this.picture,
    required this.bio,
    required this.institution,
    required this.id,
    required this.changed,
    required this.start,
    required this.end,
    required this.title,
    required this.description,
    required this.category,
    required this.locations,
    required this.type,
    required this.papers,
    required this.people,
    required this.status,
    required this.weight,
    required this.addons,
    required this.parent,
    required this.event,
  });

  static Bio? _bioFromJson(Map<String, dynamic>? json) => json == null ? Bio(ptBr: '') : Bio.fromJson(json);
  static Title? _titleFromJson(Map<String, dynamic>? json) => json == null ? Title(ptBr: '') : Title.fromJson(json);
  static Description? _descriptionFromJson(Map<String, dynamic>? json) => json == null ? Description(ptBr: '') : Description.fromJson(json);
  static Role? _roleFromJson(Map<String, dynamic>? json) => json == null ? Role(label: Description(ptBr: ''), id: 0) : Role.fromJson(json);

  static String _nullToEmptyString(dynamic value) => value ??= '';

  factory Activities.fromJson(Map<String, dynamic> json) => _$ActivitiesFromJson(json);
  Map<String, dynamic> toJson() => _$ActivitiesToJson(this);
}
